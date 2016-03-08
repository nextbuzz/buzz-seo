<?php

/*
 * The MIT License
 *
 * Copyright 2016 LengthOfRope, Bas de Kort <bdekort@gmail.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/

namespace LengthOfRope\JSONLD\Schema;

/**
 * A specific question - e.g. from a user seeking answers online, or collected in a Frequently Asked Questions (FAQ) document.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class QuestionSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new QuestionSchema('http://schema.org/', 'Question');
    }

    /**
     * The answer that has been accepted as best, typically on a Question/Answer site. Sites vary in their selection mechanisms, e.g. drawing on community opinion and/or the view of the Question author.
     *
     * @param $acceptedAnswer AnswerSchema
     **/
    public function setAcceptedAnswer($acceptedAnswer) {
        $this->properties['acceptedAnswer'] = $acceptedAnswer;

        return $this;
    }

    /**
     * @return AnswerSchema
     **/
    public function getAcceptedAnswer() {
        return $this->properties['acceptedAnswer'];
    }

    /**
     * The number of answers this question has received.
     *
     * @param $answerCount IntegerSchema
     **/
    public function setAnswerCount($answerCount) {
        $this->properties['answerCount'] = $answerCount;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getAnswerCount() {
        return $this->properties['answerCount'];
    }

    /**
     * The number of downvotes this question, answer or comment has received from the community.
     *
     * @param $downvoteCount IntegerSchema
     **/
    public function setDownvoteCount($downvoteCount) {
        $this->properties['downvoteCount'] = $downvoteCount;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getDownvoteCount() {
        return $this->properties['downvoteCount'];
    }

    /**
     * An answer (possibly one of several, possibly incorrect) to a Question, e.g. on a Question/Answer site.
     *
     * @param $suggestedAnswer AnswerSchema
     **/
    public function setSuggestedAnswer($suggestedAnswer) {
        $this->properties['suggestedAnswer'] = $suggestedAnswer;

        return $this;
    }

    /**
     * @return AnswerSchema
     **/
    public function getSuggestedAnswer() {
        return $this->properties['suggestedAnswer'];
    }

    /**
     * The number of upvotes this question, answer or comment has received from the community.
     *
     * @param $upvoteCount IntegerSchema
     **/
    public function setUpvoteCount($upvoteCount) {
        $this->properties['upvoteCount'] = $upvoteCount;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getUpvoteCount() {
        return $this->properties['upvoteCount'];
    }


}
