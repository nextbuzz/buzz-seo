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
 * Anatomical features that can be observed by sight (without dissection), including the form and proportions of the human body as well as surface landmarks that correspond to deeper subcutaneous structures. Superficial anatomy plays an important role in sports medicine, phlebotomy, and other medical specialties as underlying anatomical structures can be identified through surface palpation. For example, during back surgery, superficial anatomy can be used to palpate and count vertebrae to find the site of incision. Or in phlebotomy, superficial anatomy can be used to locate an underlying vein; for example, the median cubital vein can be located by palpating the borders of the cubital fossa (such as the epicondyles of the humerus) and then looking for the superficial signs of the vein, such as size, prominence, ability to refill after depression, and feel of surrounding tissue support. As another example, in a subluxation (dislocation) of the glenohumeral joint, the bony structure becomes pronounced with the deltoid muscle failing to cover the glenohumeral joint allowing the edges of the scapula to be superficially visible. Here, the superficial anatomy is the visible edges of the scapula, implying the underlying dislocation of the joint (the related anatomical structure).
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class SuperficialAnatomySchema extends MedicalEntitySchema
{
    public static function factory()
    {
        return new SuperficialAnatomySchema('http://schema.org/', 'SuperficialAnatomy');
    }

    /**
     * If applicable, a description of the pathophysiology associated with the anatomical system, including potential abnormal changes in the mechanical, physical, and biochemical functions of the system.
     *
     * @param $associatedPathophysiology TextSchema
     **/
    public function setAssociatedPathophysiology($associatedPathophysiology) {
        $this->properties['associatedPathophysiology'] = $associatedPathophysiology;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAssociatedPathophysiology() {
        return $this->properties['associatedPathophysiology'];
    }

    /**
     * Anatomical systems or structures that relate to the superficial anatomy.
     *
     * @param $relatedAnatomy AnatomicalStructureSchema|AnatomicalSystemSchema
     **/
    public function setRelatedAnatomy($relatedAnatomy) {
        $this->properties['relatedAnatomy'] = $relatedAnatomy;

        return $this;
    }

    /**
     * @return AnatomicalStructureSchema|AnatomicalSystemSchema
     **/
    public function getRelatedAnatomy() {
        return $this->properties['relatedAnatomy'];
    }

    /**
     * A medical condition associated with this anatomy.
     *
     * @param $relatedCondition MedicalConditionSchema
     **/
    public function setRelatedCondition($relatedCondition) {
        $this->properties['relatedCondition'] = $relatedCondition;

        return $this;
    }

    /**
     * @return MedicalConditionSchema
     **/
    public function getRelatedCondition() {
        return $this->properties['relatedCondition'];
    }

    /**
     * A medical therapy related to this anatomy.
     *
     * @param $relatedTherapy MedicalTherapySchema
     **/
    public function setRelatedTherapy($relatedTherapy) {
        $this->properties['relatedTherapy'] = $relatedTherapy;

        return $this;
    }

    /**
     * @return MedicalTherapySchema
     **/
    public function getRelatedTherapy() {
        return $this->properties['relatedTherapy'];
    }

    /**
     * The significance associated with the superficial anatomy; as an example, how characteristics of the superficial anatomy can suggest underlying medical conditions or courses of treatment.
     *
     * @param $significance TextSchema
     **/
    public function setSignificance($significance) {
        $this->properties['significance'] = $significance;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSignificance() {
        return $this->properties['significance'];
    }


}
