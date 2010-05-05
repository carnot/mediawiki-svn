package de.brightbyte.wikiword.disambig;

import java.util.ArrayList;
import java.util.Collection;
import java.util.Collections;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import de.brightbyte.data.Functor2;
import de.brightbyte.data.measure.Measure;
import de.brightbyte.data.measure.Measure.Comparator;
import de.brightbyte.wikiword.model.LocalConcept;
import de.brightbyte.wikiword.model.PhraseNode;
import de.brightbyte.wikiword.model.TermReference;
import de.brightbyte.wikiword.model.WikiWordConcept;

public class PopularityDisambiguator extends AbstractDisambiguator<TermReference, LocalConcept> {
	
	protected Measure<WikiWordConcept> popularityMeasure;
	protected Comparator<LocalConcept> popularityComparator;
	
	protected Functor2.Double weigthCombiner = new LinearCombiner(0.5);
	
	public PopularityDisambiguator(MeaningFetcher<LocalConcept> meaningFetcher) {
		this(meaningFetcher, WikiWordConcept.theCardinality);
	}
	
	public PopularityDisambiguator(MeaningFetcher<LocalConcept> meaningFetcher, Measure<WikiWordConcept> popularityMeasure) {
		super(meaningFetcher);
		
		this.setPopularityMeasure(popularityMeasure);
	}

	public Measure<WikiWordConcept> getPopularityMeasure() {
		return popularityMeasure;
	}

	public void setPopularityMeasure(Measure<WikiWordConcept> popularityMeasure) {
		this.popularityMeasure = popularityMeasure;
		this.popularityComparator = new Measure.Comparator<LocalConcept>(popularityMeasure, true);
	}

	public void setWeightCombiner(Functor2.Double weightCombiner) {
		this.weigthCombiner = weightCombiner;
	}

	public <X extends TermReference>Result<X, LocalConcept> disambiguate(PhraseNode<X> root, Map<X, List<? extends LocalConcept>> meanings, Collection<? extends LocalConcept> context) {
		Collection<List<X>> sequences = getSequences(root, Integer.MAX_VALUE);
		return disambiguate(sequences, root, meanings, context);
	}
	
	public <X extends TermReference>Result<X, LocalConcept> disambiguate(Collection<List<X>> sequences, PhraseNode<X> root, Map<X, List<? extends LocalConcept>> meanings, Collection<? extends LocalConcept> context) {
		Result<X, LocalConcept> best = null;
		
		for (List<X> sequence: sequences) {
			Result<X, LocalConcept> r = disambiguate(sequence, meanings, context);
			if (best == null || best.getScore() < r.getScore()) {
				best = r;
			}
		}
		
		return best;
	}
	
	public <X extends TermReference>Result<X, LocalConcept> disambiguate(List<X> sequence, Map<X, List<? extends LocalConcept>> meanings, Collection<? extends LocalConcept> context) {
		if (sequence.isEmpty() || meanings.isEmpty()) return new Disambiguator.Result<X, LocalConcept>(Collections.<X, LocalConcept>emptyMap(), Collections.<X>emptyList(), 0.0, "no terms or meanings");

		Map<X, LocalConcept> disambig = new HashMap<X, LocalConcept>();
		double score = 0;
		int totalPop = 0;
		
		List<X> resultSequence = new ArrayList<X>(sequence.size());
		
		for (X t: sequence) {
			List<? extends LocalConcept> m = meanings.get(t);
			if (m==null || m.size()==0) continue;
			
			resultSequence.add(t);
			
			if (m.size()>1) Collections.sort(m, popularityComparator);
			
			LocalConcept c = m.get(0);
			disambig.put(t, c);

			double pop = popularityMeasure.measure(c);
			totalPop += pop;
			
			double sc = weigthCombiner.apply(pop, t.getWeight()); //FIXME: pop and weight are not in the same scale.
			score += sc;
		}

		if (disambig.size()>0) score = score / disambig.size();
		
		Result<X, LocalConcept> r = new Result<X, LocalConcept>(disambig, resultSequence, score, "score="+score+"; pop="+totalPop);
		return r;
	}

}
