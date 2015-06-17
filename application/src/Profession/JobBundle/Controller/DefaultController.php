<?php

namespace Profession\JobBundle\Controller;

use Profession\JobBundle\Entity\Job;
use Profession\JobBundle\Form\JobActivationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    const JOB_SERVICE_ID = 'job_service';
    const JOB_MAILER_SERVICE_ID = 'job_mailer_service';

    /**
     * Display job and activation form.
     * 
     * @param int $id
     */
    public function showAction($id)
    {
        $job = $this->getJob($id);
        $form = $this->createForm(new JobActivationType, array('id' => $id), array(
            'action' => $this->generateUrl('profession_job_activation'),
        ));
        
        return $this->render(
            'ProfessionJobBundle:Default:show.html.twig', 
            array(
                'job'  => $job, 
                'form' => $form->createView()
            )
        );
    }

    /**
     * Activate job.
     * 
     * @param Request $request
     */
    public function activationAction(Request $request)
    {
        $form = $this->createForm(new JobActivationType);
        $form->handleRequest($request);
        $formData = $form->getData();
        $job = $this->getJob($formData['id']);

        //activate job
        $jobService = $this->get(self::JOB_SERVICE_ID);
        $jobService->activate($job);

        // send actvivation email
        $jobMailerService = $this->get(self::JOB_MAILER_SERVICE_ID);
        $view = $this->renderView(
            'ProfessionJobBundle:Email:activationMail.html.twig',
            array('job' => $job)
        );
        $jobMailerService->sendActivationMail($job, $view);

        // save flash message
        $this->get('session')->getFlashBag()->add(
            'info', 
            'Job activated: ' . $job->getPosition() . ' (' . $formData['id'] . ') !'
        );

        // redirect to job page
        return $this->redirectToRoute('profession_job_show', array('id' => $formData['id']));
    }

    /**
     * Get Job by ID;
     * 
     * @param int $id
     * @return Job $job
     */
    private function getJob($id) 
    {
        $jobService = $this->get(self::JOB_SERVICE_ID);
        $job = $jobService->findOneById($id);

        if (empty ($job)) {
            return $this->createNotFoundException();
        }

        return $job;
    }
}
