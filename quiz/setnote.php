

<?php

$id = $_POST['qid'];
$title = $_POST['title'];
$notetext = $_POST['text'];
$cam = $_POST['cam'];
$annots = $_POST['annotations'];
// How do we get the values store as floats rather than strings?
//$cam = json_decode($cam); did not work
//$cam.height = (float)$cam.height;
//$cam.roll = (float)$cam.roll;
//$cam.fp[0] = (float)$cam.fp[0];
//$cam.fp[1] = (float)$cam.fp[1];
//$cam.fp[2] = (float)$cam.fp[2]; did not work either

$m = new Mongo();
$d = $m->selectDb('demo');
$c3 = $d->selectCollection('questions');



//$mod = $c3->find(array('_id'=>new MongoId($id)));

//$mod['qtext'] = $qtext;
//$mod['choices'] = $choices;

//$imgid = $c3->findOne(array('_id'=>new MongoId($id)), array('imageid'=>1));

if($annots == 0){
    $annots = array();
}

$c3->update(array('qid'=>new MongoId($id)), array('$set'=>array('qtext'=>$notetext, 'title'=>$title, 'cam'=>$cam, 'annotations'=>$annots)), true);

echo json_encode($choices);

?>