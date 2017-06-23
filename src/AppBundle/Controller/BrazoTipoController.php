<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BrazoTipo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Brazotipo controller.
 *
 * @Route("brazotipo")
 */
class BrazoTipoController extends Controller
{
    /**
     * Lists all brazoTipo entities.
     *
     * @Route("/", name="brazotipo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $brazoTipos = $em->getRepository('AppBundle:BrazoTipo')->findAll();

        return $this->render('brazotipo/index.html.twig', array(
            'brazoTipos' => $brazoTipos,
        ));
    }

    /**
     * Creates a new brazoTipo entity.
     *
     * @Route("/new", name="brazotipo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $brazoTipo = new Brazotipo();
        $form = $this->createForm('AppBundle\Form\BrazoTipoType', $brazoTipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($brazoTipo);
            $em->flush();

            return $this->redirectToRoute('brazotipo_show', array('id' => $brazoTipo->getId()));
        }

        return $this->render('brazotipo/new.html.twig', array(
            'brazoTipo' => $brazoTipo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a brazoTipo entity.
     *
     * @Route("/{id}", name="brazotipo_show")
     * @Method("GET")
     */
    public function showAction(BrazoTipo $brazoTipo)
    {
        $deleteForm = $this->createDeleteForm($brazoTipo);

        return $this->render('brazotipo/show.html.twig', array(
            'brazoTipo' => $brazoTipo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing brazoTipo entity.
     *
     * @Route("/{id}/edit", name="brazotipo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BrazoTipo $brazoTipo)
    {
        $deleteForm = $this->createDeleteForm($brazoTipo);
        $editForm = $this->createForm('AppBundle\Form\BrazoTipoType', $brazoTipo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('brazotipo_edit', array('id' => $brazoTipo->getId()));
        }

        return $this->render('brazotipo/edit.html.twig', array(
            'brazoTipo' => $brazoTipo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a brazoTipo entity.
     *
     * @Route("/{id}", name="brazotipo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BrazoTipo $brazoTipo)
    {
        $form = $this->createDeleteForm($brazoTipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($brazoTipo);
            $em->flush();
        }

        return $this->redirectToRoute('brazotipo_index');
    }

    /**
     * Creates a form to delete a brazoTipo entity.
     *
     * @param BrazoTipo $brazoTipo The brazoTipo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BrazoTipo $brazoTipo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('brazotipo_delete', array('id' => $brazoTipo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
