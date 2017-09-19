<?php
/**
 * Created by PhpStorm.
 * User: oksana.repkina
 * Date: 18.09.17
 * Time: 15:21
 */

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id, $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $comments = $em->getRepository('BloggerBlogBundle:Comment')
            ->getCommentsForBlog($blog->getId());

        return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
            'comments'  => $comments
        ));
    }
}
?>

<div class="lang-container__col">
    <div class="lang-container__title">
        Азия
    </div>
    <ul class="lang-list">
        <li class="lang-list__item"><a href="/ru/can/">Россия</a></li>
    </ul>
</div>
