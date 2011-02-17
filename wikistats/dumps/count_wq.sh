#!/bin/sh
ulimit -v 8000000

clear
set=wq
# force=-f
dumps=/mnt/dumps/xmldatadumps

for x in `cat ./dblists/wikiquote.dblist` 
do perl WikiCounts.pl $force -m $set -i $dumps/public/$x -o /a/wikistats/csv_$set/ -l $x -d auto -s /mnt/php/languages ;
done;

./zip_csv.sh $set
