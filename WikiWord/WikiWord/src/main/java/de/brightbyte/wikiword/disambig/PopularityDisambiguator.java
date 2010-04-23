package de.brightbyte.wikiword.disambig;

import java.util.Collection;
import java.util.Collections;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import de.brightbyte.data.Functor2;
import de.brightbyte.data.Functors;
import de.brightbyte.data.measure.Measure;
import de.brightbyte.data.measure.Measure.Comparator;
import de.brightbyte.wikiword.model.LocalConcept;
import de.brightbyte.wikiword.model.PhraseNode;
import de.brightbyte.wikiword.model.TermReference;
import de.brightbyte.wikiword.model.WikiWordConcept;

public class PopularityDisambiguator extends AbstractDisambiguator<TermReference, LocalConcept> {
	
	protected Measure<WikiWordConcept> popularityMeasure;
	protected Functor2<? extends Number, Number, Number> weigthCombiner;
	protected Comparator<LocalConcept> popularityComparator;
	
	public PopularityDisambiguator(MeaningFetcher<LocalConcept> meaningFetcher) {
		this(meaningFetcher, WikiWordConcept.theCardinality, Functors.Double.product2);
	}
	
	public PopularityDisambiguator(MeaningFetcher<LocalConcept> meaningFetcher, Measure<WikiWordConcept> popularityMeasure, Functor2<? extends Number, Number, Number> weightCombiner) {
		super(meaningFetcher);
		
		this.setPopularityMeasure(popularityMeasure);
		this.setWeightCombiner(weightCombiner);
	}

	public Measure<WikiWordConcept> getPopularityMeasure() {
		return popularityMeasure;
	}

	public void setPopularityMeasure(Measure<WikiWordConcept> popularityMeasure) {
		this.popularityMeasure = popularityMeasure;
		this.popularityComparator = new Measure.Comparator<LocalConcept>(popularityMeasure, true);
	}

	public void setWeightCombiner(Functor2<? extends Number, Number, Number> weightCombiner) {
		this.weigthCombiner = weightCombiner;
	}

	public <X extends TermReference>Result<X, LocalConcept> disambiguate(PhraseNode<X> root, Collection<X> terms, Map<X, List<? extends LocalConcept>> meanings, Collection<LocalConcept> context) {
		if (terms.isEmpty() || meanings.isEmpty()) return new Disambiguator.Result<X, LocalConcept>(Collections.<X, LocalConcept>emptyMap(), 0.0, "no terms or meanings");

		Map<X, LocalConcept> disambig = new HashMap<X, LocalConcept>();
		double score = 0;
		int totalPop = 0;
		
		for (X t: terms) {
			List<? extends LocalConcept> m = meanings.get(t);
			if (m==null || m.size()==0) continue;
			
			if (m.size()>1) Collections.sort(m, popularityComparator);
			
			LocalConcept c = m.get(0);
			disambig.put(t, c);

			double pop = popularityMeasure.measure(c);
			totalPop += pop;
			
			Number sc = weigthCombiner.apply(pop, t.getWeight());
			score += sc.doubleValue();
		}

		if (disambig.size()>0) score = score / disambig.size();
		
		Result<X, LocalConcept> r = new Result<X, LocalConcept>(disambig, score, "score="+score+"; pop="+totalPop);
		return r;
	}

}
