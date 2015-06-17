<?php

namespace Profession\JobBundle\Service;

use Doctrine\ORM\EntityManager;
use Profession\JobBundle\Entity\Job;
use Profession\JobBundle\Repository\JobRepository;

/**
 * JobService
 */
class JobService 
{
    private $entityManager;
    private $jobRepository;

    /**
     * 
     * @param JobRepository $jobRepository
     */
    public function __construct(EntityManager $entityManager, JobRepository $jobRepository) 
    {
        $this->entityManager = $entityManager;
        $this->jobRepository = $jobRepository;
    }

    /**
     * Returns Job entity by ID.
     * 
     * @param int $id
     * @return Job
     */
    public function findOneById($id) 
    {
        return $this->jobRepository->findOneById($id);
    }

    /**
     * Set activation date and status.
     * 
     * @param Job $job
     */
    public function activate(Job $job) 
    {
        $job->setStatus(Job::STATUS_ACTIVE);
        $job->setActivated(new \DateTime);
        $this->entityManager->persist($job);
        $this->entityManager->flush();
    }
}
