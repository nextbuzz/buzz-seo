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
 * A summary of how users have interacted with this CreativeWork. In most cases, authors will use a subtype to specify the specific type of interaction.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class InteractionCounterSchema extends StructuredValueSchema
{
    public static function factory()
    {
        return new InteractionCounterSchema('http://schema.org/', 'InteractionCounter');
    }

    /**
     * The WebSite or SoftwareApplication where the interactions took place.
     *
     * @param $interactionService SoftwareApplicationSchema|WebSiteSchema
     **/
    public function setInteractionService($interactionService) {
        $this->properties['interactionService'] = $interactionService;

        return $this;
    }

    /**
     * @return SoftwareApplicationSchema|WebSiteSchema
     **/
    public function getInteractionService() {
        return $this->properties['interactionService'];
    }

    /**
     * The Action representing the type of interaction. For up votes, +1s, etc. use <a href="/LikeAction";>LikeAction</a>. For down votes use <a href="/DislikeAction">DislikeAction</a>. Otherwise, use the most specific Action.
     *
     * @param $interactionType ActionSchema
     **/
    public function setInteractionType($interactionType) {
        $this->properties['interactionType'] = $interactionType;

        return $this;
    }

    /**
     * @return ActionSchema
     **/
    public function getInteractionType() {
        return $this->properties['interactionType'];
    }

    /**
     * The number of interactions for the CreativeWork using the WebSite or SoftwareApplication.
     *
     * @param $userInteractionCount IntegerSchema
     **/
    public function setUserInteractionCount($userInteractionCount) {
        $this->properties['userInteractionCount'] = $userInteractionCount;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getUserInteractionCount() {
        return $this->properties['userInteractionCount'];
    }


}
