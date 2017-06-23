<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DepartamentoTipo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Departamentotipo controller.
 *
 * @Route("departamentotipo")
 */
class DepartamentoTipoController extends Controller
{
    /**
     * Lists all departamentoTipo entities.
     *
     * @Route("/", name="departamentotipo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $departamentoTipos = $em->getRepository('AppBundle:DepartamentoTipo')->findAll();

        return $this->render('departamentotipo/index.html.twig', array(
            'departamentoTipos' => $departamentoTipos,
        ));
    }

    /**
     * Creates a new departamentoTipo entity.
     *
     * @Route("/new", name="departamentotipo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $departamentoTipo = new Departamentotipo();
        $form = $this->createForm('AppBundle\Form\DepartamentoTipoType', $departamentoTipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($departamentoTipo);
            $em->flush();

            return $this->redirectToRoute('departamentotipo_show', array('id' => $departamentoTipo->getId()));
        }

        return $this->render('departamentotipo/new.html.twig', array(
            'departamentoTipo' => $departamentoTipo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a departamentoTipo entity.
     *
     * @Route("/{id}", name="departamentotipo_show")
     * @Method("GET")
     */
    public function showAction(DepartamentoTipo $departamentoTipo)
    {
        $deleteForm = $this->createDeleteForm($departamentoTipo);

        return $this->render('departamentotipo/show.html.twig', array(
            'departamentoTipo' => $departamentoTipo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing departamentoTipo entity.
     *
     * @Route("/{id}/edit", name="departamentotipo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DepartamentoTipo $departamentoTipo)
    {
        $deleteForm = $this->createDeleteForm($departamentoTipo);
        $editForm = $this->createForm('AppBundle\Form\DepartamentoTipoType', $departamentoTipo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('departamentotipo_edit', array('id' => $departamentoTipo->getId()));
        }

        return $this->render('departamentotipo/edit.html.twig', array(
            'departamentoTipo' => $departamentoTipo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a departamentoTipo entity.
     *
     * @Route("/{id}", name="departamentotipo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DepartamentoTipo $departamentoTipo)
    {
        $form = $this->createDeleteForm($departamentoTipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($departamentoTipo);
            $em->flush();
        }

        return $this->redirectToRoute('departamentotipo_index');
    }

    /**
     * Creates a form to delete a departamentoTipo entity.
     *
     * @param DepartamentoTipo $departamentoTipo The departamentoTipo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DepartamentoTipo $departamentoTipo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('departamentotipo_delete', array('id' => $departamentoTipo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
