<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PaqueteTipo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Paquetetipo controller.
 *
 * @Route("paquetetipo")
 */
class PaqueteTipoController extends Controller
{
    /**
     * Lists all paqueteTipo entities.
     *
     * @Route("/", name="paquetetipo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paqueteTipos = $em->getRepository('AppBundle:PaqueteTipo')->findAll();

        return $this->render('paquetetipo/index.html.twig', array(
            'paqueteTipos' => $paqueteTipos,
        ));
    }

    /**
     * Creates a new paqueteTipo entity.
     *
     * @Route("/new", name="paquetetipo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $paqueteTipo = new Paquetetipo();
        $form = $this->createForm('AppBundle\Form\PaqueteTipoType', $paqueteTipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paqueteTipo);
            $em->flush();

            return $this->redirectToRoute('paquetetipo_show', array('id' => $paqueteTipo->getId()));
        }

        return $this->render('paquetetipo/new.html.twig', array(
            'paqueteTipo' => $paqueteTipo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a paqueteTipo entity.
     *
     * @Route("/{id}", name="paquetetipo_show")
     * @Method("GET")
     */
    public function showAction(PaqueteTipo $paqueteTipo)
    {
        $deleteForm = $this->createDeleteForm($paqueteTipo);

        return $this->render('paquetetipo/show.html.twig', array(
            'paqueteTipo' => $paqueteTipo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing paqueteTipo entity.
     *
     * @Route("/{id}/edit", name="paquetetipo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PaqueteTipo $paqueteTipo)
    {
        $deleteForm = $this->createDeleteForm($paqueteTipo);
        $editForm = $this->createForm('AppBundle\Form\PaqueteTipoType', $paqueteTipo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('paquetetipo_edit', array('id' => $paqueteTipo->getId()));
        }

        return $this->render('paquetetipo/edit.html.twig', array(
            'paqueteTipo' => $paqueteTipo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a paqueteTipo entity.
     *
     * @Route("/{id}", name="paquetetipo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PaqueteTipo $paqueteTipo)
    {
        $form = $this->createDeleteForm($paqueteTipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($paqueteTipo);
            $em->flush();
        }

        return $this->redirectToRoute('paquetetipo_index');
    }

    /**
     * Creates a form to delete a paqueteTipo entity.
     *
     * @param PaqueteTipo $paqueteTipo The paqueteTipo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PaqueteTipo $paqueteTipo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('paquetetipo_delete', array('id' => $paqueteTipo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
