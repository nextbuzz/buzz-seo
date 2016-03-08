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
 * An event happening at a certain time and location, such as a concert, lecture, or festival. Ticketing information may be added via the 'offers' property. Repeated events may be structured as separate Event objects.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class EventSchema extends ThingSchema
{
    public static function factory()
    {
        return new EventSchema('http://schema.org/', 'Event');
    }

    /**
     * The overall rating, based on a collection of reviews or ratings, of the item.
     *
     * @param $aggregateRating AggregateRatingSchema
     **/
    public function setAggregateRating($aggregateRating) {
        $this->properties['aggregateRating'] = $aggregateRating;

        return $this;
    }

    /**
     * @return AggregateRatingSchema
     **/
    public function getAggregateRating() {
        return $this->properties['aggregateRating'];
    }

    /**
     * A person or organization attending the event.
     *
     * @param $attendee OrganizationSchema|PersonSchema
     **/
    public function setAttendee($attendee) {
        $this->properties['attendee'] = $attendee;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getAttendee() {
        return $this->properties['attendee'];
    }

    /**
     * A person attending the event.
     *
     * @param $attendees OrganizationSchema|PersonSchema
     **/
    public function setAttendees($attendees) {
        $this->properties['attendees'] = $attendees;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getAttendees() {
        return $this->properties['attendees'];
    }

    /**
     * The time admission will commence.
     *
     * @param $doorTime DateTimeSchema
     **/
    public function setDoorTime($doorTime) {
        $this->properties['doorTime'] = $doorTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getDoorTime() {
        return $this->properties['doorTime'];
    }

    /**
     * The duration of the item (movie, audio recording, event, etc.) in <a href='http://en.wikipedia.org/wiki/ISO_8601'>ISO 8601 date format</a>.
     *
     * @param $duration DurationSchema
     **/
    public function setDuration($duration) {
        $this->properties['duration'] = $duration;

        return $this;
    }

    /**
     * @return DurationSchema
     **/
    public function getDuration() {
        return $this->properties['duration'];
    }

    /**
     * The end date and time of the item (in <a href='http://en.wikipedia.org/wiki/ISO_8601'>ISO 8601 date format</a>).
     *
     * @param $endDate DateSchema
     **/
    public function setEndDate($endDate) {
        $this->properties['endDate'] = $endDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getEndDate() {
        return $this->properties['endDate'];
    }

    /**
     * An eventStatus of an event represents its status; particularly useful when an event is cancelled or rescheduled.
     *
     * @param $eventStatus EventStatusTypeSchema
     **/
    public function setEventStatus($eventStatus) {
        $this->properties['eventStatus'] = $eventStatus;

        return $this;
    }

    /**
     * @return EventStatusTypeSchema
     **/
    public function getEventStatus() {
        return $this->properties['eventStatus'];
    }

    /**
     * The language of the content or performance or used in an action. Please use one of the language codes from the <a href='http://tools.ietf.org/html/bcp47'>IETF BCP 47 standard</a>.
     *
     * @param $inLanguage TextSchema|LanguageSchema
     **/
    public function setInLanguage($inLanguage) {
        $this->properties['inLanguage'] = $inLanguage;

        return $this;
    }

    /**
     * @return TextSchema|LanguageSchema
     **/
    public function getInLanguage() {
        return $this->properties['inLanguage'];
    }

    /**
     * The location of for example where the event is happening, an organization is located, or where an action takes place.
     *
     * @param $location PlaceSchema|PostalAddressSchema|TextSchema
     **/
    public function setLocation($location) {
        $this->properties['location'] = $location;

        return $this;
    }

    /**
     * @return PlaceSchema|PostalAddressSchema|TextSchema
     **/
    public function getLocation() {
        return $this->properties['location'];
    }

    /**
     * An offer to provide this item&#x2014;for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event.
     *
     * @param $offers OfferSchema
     **/
    public function setOffers($offers) {
        $this->properties['offers'] = $offers;

        return $this;
    }

    /**
     * @return OfferSchema
     **/
    public function getOffers() {
        return $this->properties['offers'];
    }

    /**
     * An organizer of an Event.
     *
     * @param $organizer PersonSchema|OrganizationSchema
     **/
    public function setOrganizer($organizer) {
        $this->properties['organizer'] = $organizer;

        return $this;
    }

    /**
     * @return PersonSchema|OrganizationSchema
     **/
    public function getOrganizer() {
        return $this->properties['organizer'];
    }

    /**
     * A performer at the event&#x2014;for example, a presenter, musician, musical group or actor.
     *
     * @param $performer OrganizationSchema|PersonSchema
     **/
    public function setPerformer($performer) {
        $this->properties['performer'] = $performer;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getPerformer() {
        return $this->properties['performer'];
    }

    /**
     * The main performer or performers of the event&#x2014;for example, a presenter, musician, or actor.
     *
     * @param $performers OrganizationSchema|PersonSchema
     **/
    public function setPerformers($performers) {
        $this->properties['performers'] = $performers;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getPerformers() {
        return $this->properties['performers'];
    }

    /**
     * Used in conjunction with eventStatus for rescheduled or cancelled events. This property contains the previously scheduled start date. For rescheduled events, the startDate property should be used for the newly scheduled start date. In the (rare) case of an event that has been postponed and rescheduled multiple times, this field may be repeated.
     *
     * @param $previousStartDate DateSchema
     **/
    public function setPreviousStartDate($previousStartDate) {
        $this->properties['previousStartDate'] = $previousStartDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getPreviousStartDate() {
        return $this->properties['previousStartDate'];
    }

    /**
     * The CreativeWork that captured all or part of this Event.
     *
     * @param $recordedIn CreativeWorkSchema
     **/
    public function setRecordedIn($recordedIn) {
        $this->properties['recordedIn'] = $recordedIn;

        return $this;
    }

    /**
     * @return CreativeWorkSchema
     **/
    public function getRecordedIn() {
        return $this->properties['recordedIn'];
    }

    /**
     * A review of the item.
     *
     * @param $review ReviewSchema
     **/
    public function setReview($review) {
        $this->properties['review'] = $review;

        return $this;
    }

    /**
     * @return ReviewSchema
     **/
    public function getReview() {
        return $this->properties['review'];
    }

    /**
     * The start date and time of the item (in <a href='http://en.wikipedia.org/wiki/ISO_8601'>ISO 8601 date format</a>).
     *
     * @param $startDate DateSchema
     **/
    public function setStartDate($startDate) {
        $this->properties['startDate'] = $startDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getStartDate() {
        return $this->properties['startDate'];
    }

    /**
     * An Event that is part of this event. For example, a conference event includes many presentations, each of which is a subEvent of the conference.
     *
     * @param $subEvent EventSchema
     **/
    public function setSubEvent($subEvent) {
        $this->properties['subEvent'] = $subEvent;

        return $this;
    }

    /**
     * @return EventSchema
     **/
    public function getSubEvent() {
        return $this->properties['subEvent'];
    }

    /**
     * Events that are a part of this event. For example, a conference event includes many presentations, each subEvents of the conference.
     *
     * @param $subEvents EventSchema
     **/
    public function setSubEvents($subEvents) {
        $this->properties['subEvents'] = $subEvents;

        return $this;
    }

    /**
     * @return EventSchema
     **/
    public function getSubEvents() {
        return $this->properties['subEvents'];
    }

    /**
     * An event that this event is a part of. For example, a collection of individual music performances might each have a music festival as their superEvent.
     *
     * @param $superEvent EventSchema
     **/
    public function setSuperEvent($superEvent) {
        $this->properties['superEvent'] = $superEvent;

        return $this;
    }

    /**
     * @return EventSchema
     **/
    public function getSuperEvent() {
        return $this->properties['superEvent'];
    }

    /**
     * The typical expected age range, e.g. '7-9', '11-'.
     *
     * @param $typicalAgeRange TextSchema
     **/
    public function setTypicalAgeRange($typicalAgeRange) {
        $this->properties['typicalAgeRange'] = $typicalAgeRange;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getTypicalAgeRange() {
        return $this->properties['typicalAgeRange'];
    }

    /**
     * A work featured in some event, e.g. exhibited in an ExhibitionEvent.
       Specific subproperties are available for workPerformed (e.g. a play), or a workPresented (a Movie at a ScreeningEvent).
     *
     * @param $workFeatured CreativeWorkSchema
     **/
    public function setWorkFeatured($workFeatured) {
        $this->properties['workFeatured'] = $workFeatured;

        return $this;
    }

    /**
     * @return CreativeWorkSchema
     **/
    public function getWorkFeatured() {
        return $this->properties['workFeatured'];
    }

    /**
     * A work performed in some event, for example a play performed in a TheaterEvent.
     *
     * @param $workPerformed CreativeWorkSchema
     **/
    public function setWorkPerformed($workPerformed) {
        $this->properties['workPerformed'] = $workPerformed;

        return $this;
    }

    /**
     * @return CreativeWorkSchema
     **/
    public function getWorkPerformed() {
        return $this->properties['workPerformed'];
    }


}
