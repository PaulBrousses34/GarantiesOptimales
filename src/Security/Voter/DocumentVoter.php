<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class DocumentVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['READ', 'EDIT', 'DELETE'])
            && $subject instanceof \App\Entity\Document;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'READ':
                if($subject->getUtilisateur() == $user){
                    return true;
                }
                break;

            case 'EDIT':
                if($subject->getUtilisateur() == $user){
                    return true;
                }
                break;
            
            case 'DELETE':
                if($subject->getUtilisateur() == $user){
                    return true;
                }
                break;
        }

        return false;
    }
}
