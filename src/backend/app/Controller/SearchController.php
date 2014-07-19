<?php

App::uses('AppController', 'Controller');

class SearchController extends AppController {

    public function index() {
        $q = trim($this->request->data['query'],'%');
        $this->set('query',$q);
        
        if(strlen($q)<3) {
            $this->set('error',"Trois caractères minimum.");
            return;
        }
        
        $results = array();
        
        $models = App::objects('Model');
        foreach ($models as $model) {
            $this->loadModel($model);
            if(empty($this->$model->SearchMe)) continue;
            $schema = $this->$model->schema();
            $relations = $this->$model->belongsTo;
            $conditions = array();
            foreach($schema as $row => $info) {
                $conditions["$model.$row LIKE"] = "%$q%";
            }
            $params = array(
                'conditions' => array('OR' => $conditions),
                'recursive' => 0,
            );
            $data = $this->$model->find('all', $params);
            if(empty($data)) continue;
            if(is_array($this->$model->indexFields)) $schema = array_intersect_key($schema, array_fill_keys($this->$model->indexFields,1));
            $results[$model] = array();
            foreach($data as $row) {
                $result = array();
                foreach($relations as $params) {
                    $this->loadModel($params['className']);
                    $df = $this->$params['className']->displayField;
                    if(!$df) $df = 'id';
                    $result[$params['foreignKey']] = $row[$params['className']][$df];
                }
                foreach($row[$model] as $name => $col) {
                    if(empty($result[$name])) $result[$name] = $col;
                }
                $results[$model][] = $result;
            }
            $results[$model]['schema'] = $schema;
        }
        
        $this->set('results',$results);
	}

}
?>
