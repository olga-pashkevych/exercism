<?php

/**Bob is a lackadaisical teenager. In conversation, his responses are very limited.
* Bob answers 'Sure.' if you ask him a question.
* He answers 'Whoa, chill out!' if you yell at him.
* He answers 'Calm down, I know what I'm doing!' if you yell a question at him.
* He says 'Fine. Be that way!' if you address him without actually saying anything.
* He answers 'Whatever.' to anything else.
*/

class Bob
{
    public function respondTo(string $phrase): string
    {
        $phrase = trim($phrase, " \n\r\t\u{000b}\u{00a0}\u{2002}");
        $isUpperCase = ($phrase === mb_strtoupper($phrase)) && preg_match('/[a-z]+/i', $phrase);
        $isQuestion = (strpos($phrase, '?')+1 === strlen($phrase));
        $isNothing = empty($phrase);

        if (!$isUpperCase && $isQuestion) return $this->respondToQuestion();
        if ($isUpperCase && !$isQuestion) return $this->respondToYell();
        if ($isUpperCase && $isQuestion) return $this->respondToYellQuestion();
        if ($isNothing) return $this->respondToWithoutActually();

        return $this->respondToAnything();
    }

    protected function respondToQuestion(): string
    {
        return 'Sure.';
    }

    protected function respondToYell(): string
    {
        return 'Whoa, chill out!';
    }

    protected function respondToYellQuestion(): string
    {
        return 'Calm down, I know what I\'m doing!';
    }

    protected function respondToWithoutActually(): string
    {
        return 'Fine. Be that way!';
    }

    protected function respondToAnything(): string
    {
        return 'Whatever.';
    }
}

//$bob = new Bob;
//echo $bob->respondTo('ZOMG THE %^*@#$(*^ ZOMBIES ARE COMING!!11!!1');

