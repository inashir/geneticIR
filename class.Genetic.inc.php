<?php

/***
 * Class Genetic
 * Implement Genetic Algorithm in Information Retrival
 * A. Input and Output
 *  1. Document as Corpus
 *  2. Query
 *
 * B. Proses Algoritm Genetic
 *  1. Chromosome Representation
 *  2. Fitness Evaluation
 *  3. CrossOver
 *  4. Mutation
 *  5. Elitisme
 *
 * By Muhammad Nasir
 * @2015
 */

class Genetic
{
    // Declare Documents as s Corpus.
    public $doc_1 = array('Data', 'Retrieval', 'Database', 'Computer', 'Networks', 'Improvements', 'Information', 'Method', 'Multiple', 'Query', 'Relation');
    public $doc_2 = array('Information', 'Retrieval', 'Storage', 'Indexing', 'Keyword');
    public $doc_3 = array('Artificial', 'Intelligence', 'Information', 'Retrieval', 'Systems', 'Indexing', 'Natural', 'Language', 'Processing');
    public $doc_4 = array('Fuzzy', 'Set', 'Theory', 'Information', 'Retrieval', 'Systems', 'Indexing', 'Performance');
    public $doc_5 = array('Information', 'Retrieval', 'System', 'Indexing', 'Stairs');

    //Declare a Simple Queri
    public $query = 'Information Retrieval Database Mysql System Indexing';

    /**
     * Explode all word in query
     * @return array $kata
     */
    public function kataQuery()
    {
        return $kata = explode(' ', $this->query);
    }

    /**
     * collection all docs
     * @return array $documents
     */
    public function Docs()
    {
        $documents = array(
            'document 1' => $this->doc_1,
            'document 2' => $this->doc_2,
            'document 3' => $this->doc_3,
            'document 4' => $this->doc_4,
            'document 5' => $this->doc_5,
        );

        return $documents;
    }

    /**
     * display all word of query
     */
    public function displayQuery()
    {
        $kata = $this->kataQuery();
        echo '<pre>'. var_export($kata, true) .'</pre>';
        for ($i=0; $i < count($kata); $i++) {
            $a = $kata[$i];
            echo $a."<br>";
        }
    }

    /**
     * display a selected content
     * @param $doc
     */
    public function displayContentADoc($doc)
    {
        /** @var array $docView */
        for ($i=0; $i < count($doc); $i++) {
            $a = $doc;
            $no = $i + 1;
            echo $no . '. ' . $a[$i] . '<br>';
        }
    }
}

echo '<h2>Document Collection</h2>';
$docView = new Genetic;

echo '<h2>Testing print kata in query</h2>';
echo $docView->displayQuery();
//echo '<pre>'. var_export($docView->displayQuery(), true) .'</pre>';
//$kata = explode(' ', $docView->displayQuery());
//echo '<pre>'. var_export($kata, true) .'</pre>';

echo '<h2>Testing print kata in doc1</h2>';
//echo '<pre>'. var_export($docView->doc_1, true) .'</pre>';
$docView->displayContentADoc($docView->doc_1);

echo '<h2>Testing print all of docs</h2>';

echo '<h2>Total Document : <i>'.count($docView->Docs()). '</i></h2>';

echo '<pre>'. var_export($docView->Docs(), true) .'</pre>';
for ($i = 0; $i < count($docView->Docs()); $i++) {
    //echo $i;
}

/**
 * Masalahnya disini mastah :v
 */
echo '<h2>Testing chromosome represntation</h2>';
$chromosome = [];
foreach ($docView->Docs() as $key => $values) {
    echo $key.'<br>';
    //$a = array($key);
    //$chromosome[] .= $key;
    for ($i=0; $i < count($key); $i++) {
        for ($i=0; $i < count($docView->kataQuery()); $i++) {
           // if (is_null($chromosome[$key])) {
              //  $chromosome[$key] = array();
                if (in_array($docView->kataQuery()[$i], $values)) {
                    echo 1;
                    $chromosome[$key] .= 1;
                } else {
                    echo 0;
                    $chromosome[$key] .= 0;
                }
            //}

        }
        echo '<br>';
    }
}
echo '<pre>' . var_export($chromosome, true) . '</pre>';
