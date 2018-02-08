<?php

require_once('Cool/BaseController.php');
require_once('Model/PostManager.php');

class MainController extends BaseController
{
    public function homeAction()
    {
        $manager = new PostManager();
        $posts = $manager->getAllPosts();
        
        $data = [
            'posts' => $posts
        ];
        
        return $this->render('home.html.twig', $data);
    }
    
    public function articleAction()
    {
        $manager = new PostManager();
        $post = $manager->getPostById(intval($_GET['id']));
        
        $data = [
            'article' => $post
        ];
        
        return $this->render('article.html.twig', $data);
        
    }

    public function contactAction()
    {
        return $this->render('contact.html.twig');
    }

    public function addArticleAction()
    {
        if(isset($_POST['title']) && isset($_POST['content'])){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $manager = new PostManager();
            $posts = $manager->addPosts();
        }

        $data = [
            'posts' => $posts,
            'title' => $title,
            'content' => $content
        ];

        return $this->render('post.html.twig', $data);
    }
}
