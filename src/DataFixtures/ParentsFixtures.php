<?php

namespace App\DataFixtures;

use App\Entity\Parents;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ParentsFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        $user =new Parents();
        $user->setEmail('charon.hugo@gmail.com');
        $user->setFirstname('hugo');
        $user->setLastname('charon');

        $user->setPhoneNumber(0620202020);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'test'
        ));
        $user->setRoles([ 'ROLE_ADMIN' ]);
        $manager->persist($user);
        $manager->flush();
    }
}
