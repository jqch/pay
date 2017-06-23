<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MonedaTipo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Monedatipo controller.
 *
 * @Route("monedatipo")
 */
class MonedaTipoController extends Controller
{
    /**
     * Lists all monedaTipo entities.
     *
     * @Route("/", name="monedatipo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $monedaTipos = $em->getRepository('AppBundle:MonedaTipo')->findAll();

        return $this->render('monedatipo/index.html.twig', array(
            'monedaTipos' => $monedaTipos,
        ));
    }

    /**
     * Creates a new monedaTipo entity.
     *
     * @Route("/new", name="monedatipo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $monedaTipo = new Monedatipo();
        $form = $this->createForm('AppBundle\Form\MonedaTipoType', $monedaTipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($monedaTipo);
            $em->flush();

            return $this->redirectToRoute('monedatipo_show', array('id' => $monedaTipo->getId()));
        }

        return $this->render('monedatipo/new.html.twig', array(
            'monedaTipo' => $monedaTipo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a monedaTipo entity.
     *
     * @Route("/{id}", name="monedatipo_show")
     * @Method("GET")
     */
    public function showAction(MonedaTipo $monedaTipo)
    {
        $deleteForm = $this->createDeleteForm($monedaTipo);

        return $this->render('monedatipo/show.html.twig', array(
            'monedaTipo' => $monedaTipo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing monedaTipo entity.
     *
     * @Route("/{id}/edit", name="monedatipo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MonedaTipo $monedaTipo)
    {
        $deleteForm = $this->createDeleteForm($monedaTipo);
        $editForm = $this->createForm('AppBundle\Form\MonedaTipoType', $monedaTipo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('monedatipo_edit', array('id' => $monedaTipo->getId()));
        }

        return $this->render('monedatipo/edit.html.twig', array(
            'monedaTipo' => $monedaTipo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a monedaTipo entity.
     *
     * @Route("/{id}", name="monedatipo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MonedaTipo $monedaTipo)
    {
        $form = $this->createDeleteForm($monedaTipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($monedaTipo);
            $em->flush();
        }

        return $this->redirectToRoute('monedatipo_index');
    }

    /**
     * Creates a form to delete a monedaTipo entity.
     *
     * @param MonedaTipo $monedaTipo The monedaTipo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MonedaTipo $monedaTipo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('monedatipo_delete', array('id' => $monedaTipo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
