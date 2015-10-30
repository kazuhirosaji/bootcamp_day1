<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

    public $uses = array(
        'Category',
        'Comment',
        'Topic',
        'User'
    );

    public function index() {
        $topics = $this->Topic->find('all');
        $this->set('topics', $topics);
    }

    public function detail() {
        // パラメーターを取得
        $id = $this->request->params['id'];

        if (!$this->Topic->exists($id)) {
            throw new NotFoundException('Invalid topic');
        }

        $options = array( 
            'conditions' => array(
                'Topic.id' => $id
            )
        );
        $this->set('topic', $this->Topic->find('first', $options));

        $topic_comments = $this->Topic->Comment->find('all', array(
            'fields' => array('Comment.comment', 'Comment.title', 'Comment.comment_name'),
            'conditions' => array('Comment.topic_id' => $id),
        ));
        $this->set(compact('topic_comments'));
    }


}


