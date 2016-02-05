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
 * The most generic kind of creative work, including books, movies, photographs, software programs, etc.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class CreativeWorkSchema extends ThingSchema
{
    public static function factory()
    {
        return new CreativeWorkSchema('http://schema.org/', 'CreativeWork');
    }

    /**
     * The subject matter of the content.
     *
     * @param $about ThingSchema
     **/
    public function setAbout($about) {
        $this->properties['about'] = $about;

        return $this;
    }

    /**
     * @return ThingSchema
     **/
    public function getAbout() {
        return $this->properties['about'];
    }

    /**
     * Indicates that the resource is compatible with the referenced accessibility API (<a href="http://www.w3.org/wiki/WebSchemas/Accessibility">WebSchemas wiki lists possible values</a>).
     *
     * @param $accessibilityAPI TextSchema
     **/
    public function setAccessibilityAPI($accessibilityAPI) {
        $this->properties['accessibilityAPI'] = $accessibilityAPI;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAccessibilityAPI() {
        return $this->properties['accessibilityAPI'];
    }

    /**
     * Identifies input methods that are sufficient to fully control the described resource (<a href="http://www.w3.org/wiki/WebSchemas/Accessibility">WebSchemas wiki lists possible values</a>).
     *
     * @param $accessibilityControl TextSchema
     **/
    public function setAccessibilityControl($accessibilityControl) {
        $this->properties['accessibilityControl'] = $accessibilityControl;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAccessibilityControl() {
        return $this->properties['accessibilityControl'];
    }

    /**
     * Content features of the resource, such as accessible media, alternatives and supported enhancements for accessibility (<a href="http://www.w3.org/wiki/WebSchemas/Accessibility">WebSchemas wiki lists possible values</a>).
     *
     * @param $accessibilityFeature TextSchema
     **/
    public function setAccessibilityFeature($accessibilityFeature) {
        $this->properties['accessibilityFeature'] = $accessibilityFeature;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAccessibilityFeature() {
        return $this->properties['accessibilityFeature'];
    }

    /**
     * A characteristic of the described resource that is physiologically dangerous to some users. Related to WCAG 2.0 guideline 2.3 (<a href="http://www.w3.org/wiki/WebSchemas/Accessibility">WebSchemas wiki lists possible values</a>).
     *
     * @param $accessibilityHazard TextSchema
     **/
    public function setAccessibilityHazard($accessibilityHazard) {
        $this->properties['accessibilityHazard'] = $accessibilityHazard;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAccessibilityHazard() {
        return $this->properties['accessibilityHazard'];
    }

    /**
     * Specifies the Person that is legally accountable for the CreativeWork.
     *
     * @param $accountablePerson PersonSchema
     **/
    public function setAccountablePerson($accountablePerson) {
        $this->properties['accountablePerson'] = $accountablePerson;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getAccountablePerson() {
        return $this->properties['accountablePerson'];
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
     * A secondary title of the CreativeWork.
     *
     * @param $alternativeHeadline TextSchema
     **/
    public function setAlternativeHeadline($alternativeHeadline) {
        $this->properties['alternativeHeadline'] = $alternativeHeadline;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAlternativeHeadline() {
        return $this->properties['alternativeHeadline'];
    }

    /**
     * A media object that encodes this CreativeWork. This property is a synonym for encoding.
     *
     * @param $associatedMedia MediaObjectSchema
     **/
    public function setAssociatedMedia($associatedMedia) {
        $this->properties['associatedMedia'] = $associatedMedia;

        return $this;
    }

    /**
     * @return MediaObjectSchema
     **/
    public function getAssociatedMedia() {
        return $this->properties['associatedMedia'];
    }

    /**
     * An intended audience, i.e. a group for whom something was created.
     *
     * @param $audience AudienceSchema
     **/
    public function setAudience($audience) {
        $this->properties['audience'] = $audience;

        return $this;
    }

    /**
     * @return AudienceSchema
     **/
    public function getAudience() {
        return $this->properties['audience'];
    }

    /**
     * An embedded audio object.
     *
     * @param $audio AudioObjectSchema
     **/
    public function setAudio($audio) {
        $this->properties['audio'] = $audio;

        return $this;
    }

    /**
     * @return AudioObjectSchema
     **/
    public function getAudio() {
        return $this->properties['audio'];
    }

    /**
     * The author of this content. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably.
     *
     * @param $author OrganizationSchema|PersonSchema
     **/
    public function setAuthor($author) {
        $this->properties['author'] = $author;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getAuthor() {
        return $this->properties['author'];
    }

    /**
     * An award won by or for this item.
     *
     * @param $award TextSchema
     **/
    public function setAward($award) {
        $this->properties['award'] = $award;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAward() {
        return $this->properties['award'];
    }

    /**
     * Awards won by or for this item.
     *
     * @param $awards TextSchema
     **/
    public function setAwards($awards) {
        $this->properties['awards'] = $awards;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAwards() {
        return $this->properties['awards'];
    }

    /**
     * Fictional person connected with a creative work.
     *
     * @param $character PersonSchema
     **/
    public function setCharacter($character) {
        $this->properties['character'] = $character;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getCharacter() {
        return $this->properties['character'];
    }

    /**
     * A citation or reference to another creative work, such as another publication, web page, scholarly article, etc.
     *
     * @param $citation CreativeWorkSchema|TextSchema
     **/
    public function setCitation($citation) {
        $this->properties['citation'] = $citation;

        return $this;
    }

    /**
     * @return CreativeWorkSchema|TextSchema
     **/
    public function getCitation() {
        return $this->properties['citation'];
    }

    /**
     * Comments, typically from users.
     *
     * @param $comment CommentSchema
     **/
    public function setComment($comment) {
        $this->properties['comment'] = $comment;

        return $this;
    }

    /**
     * @return CommentSchema
     **/
    public function getComment() {
        return $this->properties['comment'];
    }

    /**
     * The number of comments this CreativeWork (e.g. Article, Question or Answer) has received. This is most applicable to works published in Web sites with commenting system; additional comments may exist elsewhere.
     *
     * @param $commentCount IntegerSchema
     **/
    public function setCommentCount($commentCount) {
        $this->properties['commentCount'] = $commentCount;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getCommentCount() {
        return $this->properties['commentCount'];
    }

    /**
     * The location depicted or described in the content. For example, the location in a photograph or painting.
     *
     * @param $contentLocation PlaceSchema
     **/
    public function setContentLocation($contentLocation) {
        $this->properties['contentLocation'] = $contentLocation;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getContentLocation() {
        return $this->properties['contentLocation'];
    }

    /**
     * Official rating of a piece of content&#x2014;for example,'MPAA PG-13'.
     *
     * @param $contentRating TextSchema
     **/
    public function setContentRating($contentRating) {
        $this->properties['contentRating'] = $contentRating;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getContentRating() {
        return $this->properties['contentRating'];
    }

    /**
     * A secondary contributor to the CreativeWork.
     *
     * @param $contributor OrganizationSchema|PersonSchema
     **/
    public function setContributor($contributor) {
        $this->properties['contributor'] = $contributor;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getContributor() {
        return $this->properties['contributor'];
    }

    /**
     * The party holding the legal copyright to the CreativeWork.
     *
     * @param $copyrightHolder OrganizationSchema|PersonSchema
     **/
    public function setCopyrightHolder($copyrightHolder) {
        $this->properties['copyrightHolder'] = $copyrightHolder;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getCopyrightHolder() {
        return $this->properties['copyrightHolder'];
    }

    /**
     * The year during which the claimed copyright for the CreativeWork was first asserted.
     *
     * @param $copyrightYear NumberSchema
     **/
    public function setCopyrightYear($copyrightYear) {
        $this->properties['copyrightYear'] = $copyrightYear;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getCopyrightYear() {
        return $this->properties['copyrightYear'];
    }

    /**
     * The creator/author of this CreativeWork. This is the same as the Author property for CreativeWork.
     *
     * @param $creator OrganizationSchema|PersonSchema
     **/
    public function setCreator($creator) {
        $this->properties['creator'] = $creator;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getCreator() {
        return $this->properties['creator'];
    }

    /**
     * The date on which the CreativeWork was created or the item was added to a DataFeed.
     *
     * @param $dateCreated DateSchema|DateTimeSchema
     **/
    public function setDateCreated($dateCreated) {
        $this->properties['dateCreated'] = $dateCreated;

        return $this;
    }

    /**
     * @return DateSchema|DateTimeSchema
     **/
    public function getDateCreated() {
        return $this->properties['dateCreated'];
    }

    /**
     * The date on which the CreativeWork was most recently modified or when the item's entry was modified within a DataFeed.
     *
     * @param $dateModified DateSchema|DateTimeSchema
     **/
    public function setDateModified($dateModified) {
        $this->properties['dateModified'] = $dateModified;

        return $this;
    }

    /**
     * @return DateSchema|DateTimeSchema
     **/
    public function getDateModified() {
        return $this->properties['dateModified'];
    }

    /**
     * Date of first broadcast/publication.
     *
     * @param $datePublished DateSchema
     **/
    public function setDatePublished($datePublished) {
        $this->properties['datePublished'] = $datePublished;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getDatePublished() {
        return $this->properties['datePublished'];
    }

    /**
     * A link to the page containing the comments of the CreativeWork.
     *
     * @param $discussionUrl URLSchema
     **/
    public function setDiscussionUrl($discussionUrl) {
        $this->properties['discussionUrl'] = $discussionUrl;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getDiscussionUrl() {
        return $this->properties['discussionUrl'];
    }

    /**
     * Specifies the Person who edited the CreativeWork.
     *
     * @param $editor PersonSchema
     **/
    public function setEditor($editor) {
        $this->properties['editor'] = $editor;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getEditor() {
        return $this->properties['editor'];
    }

    /**
     * An alignment to an established educational framework.
     *
     * @param $educationalAlignment AlignmentObjectSchema
     **/
    public function setEducationalAlignment($educationalAlignment) {
        $this->properties['educationalAlignment'] = $educationalAlignment;

        return $this;
    }

    /**
     * @return AlignmentObjectSchema
     **/
    public function getEducationalAlignment() {
        return $this->properties['educationalAlignment'];
    }

    /**
     * The purpose of a work in the context of education; for example, 'assignment', 'group work'.
     *
     * @param $educationalUse TextSchema
     **/
    public function setEducationalUse($educationalUse) {
        $this->properties['educationalUse'] = $educationalUse;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getEducationalUse() {
        return $this->properties['educationalUse'];
    }

    /**
     * A media object that encodes this CreativeWork. This property is a synonym for associatedMedia.
     *
     * @param $encoding MediaObjectSchema
     **/
    public function setEncoding($encoding) {
        $this->properties['encoding'] = $encoding;

        return $this;
    }

    /**
     * @return MediaObjectSchema
     **/
    public function getEncoding() {
        return $this->properties['encoding'];
    }

    /**
     * A media object that encodes this CreativeWork.
     *
     * @param $encodings MediaObjectSchema
     **/
    public function setEncodings($encodings) {
        $this->properties['encodings'] = $encodings;

        return $this;
    }

    /**
     * @return MediaObjectSchema
     **/
    public function getEncodings() {
        return $this->properties['encodings'];
    }

    /**
     * A creative work that this work is an example/instance/realization/derivation of.
     *
     * @param $exampleOfWork CreativeWorkSchema
     **/
    public function setExampleOfWork($exampleOfWork) {
        $this->properties['exampleOfWork'] = $exampleOfWork;

        return $this;
    }

    /**
     * @return CreativeWorkSchema
     **/
    public function getExampleOfWork() {
        return $this->properties['exampleOfWork'];
    }

    /**
     * Media type (aka MIME format, see <a href="http://www.iana.org/assignments/media-types/media-types.xhtml">IANA site</a>) of the content e.g. application/zip of a SoftwareApplication binary. In cases where a CreativeWork has several media type representations, 'encoding' can be used to indicate each MediaObject alongside particular fileFormat information.
     *
     * @param $fileFormat TextSchema
     **/
    public function setFileFormat($fileFormat) {
        $this->properties['fileFormat'] = $fileFormat;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getFileFormat() {
        return $this->properties['fileFormat'];
    }

    /**
     * Genre of the creative work or group.
     *
     * @param $genre TextSchema|URLSchema
     **/
    public function setGenre($genre) {
        $this->properties['genre'] = $genre;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getGenre() {
        return $this->properties['genre'];
    }

    /**
     * Indicates a CreativeWork that is (in some sense) a part of this CreativeWork.
     *
     * @param $hasPart CreativeWorkSchema
     **/
    public function setHasPart($hasPart) {
        $this->properties['hasPart'] = $hasPart;

        return $this;
    }

    /**
     * @return CreativeWorkSchema
     **/
    public function getHasPart() {
        return $this->properties['hasPart'];
    }

    /**
     * Headline of the article.
     *
     * @param $headline TextSchema
     **/
    public function setHeadline($headline) {
        $this->properties['headline'] = $headline;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getHeadline() {
        return $this->properties['headline'];
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
     * The number of interactions for the CreativeWork using the WebSite or SoftwareApplication. The most specific child type of InteractionCounter should be used.
     *
     * @param $interactionStatistic InteractionCounterSchema
     **/
    public function setInteractionStatistic($interactionStatistic) {
        $this->properties['interactionStatistic'] = $interactionStatistic;

        return $this;
    }

    /**
     * @return InteractionCounterSchema
     **/
    public function getInteractionStatistic() {
        return $this->properties['interactionStatistic'];
    }

    /**
     * The predominant mode of learning supported by the learning resource. Acceptable values are 'active', 'expositive', or 'mixed'.
     *
     * @param $interactivityType TextSchema
     **/
    public function setInteractivityType($interactivityType) {
        $this->properties['interactivityType'] = $interactivityType;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getInteractivityType() {
        return $this->properties['interactivityType'];
    }

    /**
     * A resource that was used in the creation of this resource. This term can be repeated for multiple sources. For example, http://example.com/great-multiplication-intro.html.
     *
     * @param $isBasedOnUrl URLSchema
     **/
    public function setIsBasedOnUrl($isBasedOnUrl) {
        $this->properties['isBasedOnUrl'] = $isBasedOnUrl;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getIsBasedOnUrl() {
        return $this->properties['isBasedOnUrl'];
    }

    /**
     * Indicates whether this content is family friendly.
     *
     * @param $isFamilyFriendly BooleanSchema
     **/
    public function setIsFamilyFriendly($isFamilyFriendly) {
        $this->properties['isFamilyFriendly'] = $isFamilyFriendly;

        return $this;
    }

    /**
     * @return BooleanSchema
     **/
    public function getIsFamilyFriendly() {
        return $this->properties['isFamilyFriendly'];
    }

    /**
     * Indicates a CreativeWork that this CreativeWork is (in some sense) part of.
     *
     * @param $isPartOf CreativeWorkSchema
     **/
    public function setIsPartOf($isPartOf) {
        $this->properties['isPartOf'] = $isPartOf;

        return $this;
    }

    /**
     * @return CreativeWorkSchema
     **/
    public function getIsPartOf() {
        return $this->properties['isPartOf'];
    }

    /**
     * Keywords or tags used to describe this content. Multiple entries in a keywords list are typically delimited by commas.
     *
     * @param $keywords TextSchema
     **/
    public function setKeywords($keywords) {
        $this->properties['keywords'] = $keywords;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getKeywords() {
        return $this->properties['keywords'];
    }

    /**
     * The predominant type or kind characterizing the learning resource. For example, 'presentation', 'handout'.
     *
     * @param $learningResourceType TextSchema
     **/
    public function setLearningResourceType($learningResourceType) {
        $this->properties['learningResourceType'] = $learningResourceType;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getLearningResourceType() {
        return $this->properties['learningResourceType'];
    }

    /**
     * A license document that applies to this content, typically indicated by URL.
     *
     * @param $license CreativeWorkSchema|URLSchema
     **/
    public function setLicense($license) {
        $this->properties['license'] = $license;

        return $this;
    }

    /**
     * @return CreativeWorkSchema|URLSchema
     **/
    public function getLicense() {
        return $this->properties['license'];
    }

    /**
     * The location where the CreativeWork was created, which may not be the same as the location depicted in the CreativeWork.
     *
     * @param $locationCreated PlaceSchema
     **/
    public function setLocationCreated($locationCreated) {
        $this->properties['locationCreated'] = $locationCreated;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getLocationCreated() {
        return $this->properties['locationCreated'];
    }

    /**
     * Indicates the primary entity described in some page or other CreativeWork.
     *
     * @param $mainEntity ThingSchema
     **/
    public function setMainEntity($mainEntity) {
        $this->properties['mainEntity'] = $mainEntity;

        return $this;
    }

    /**
     * @return ThingSchema
     **/
    public function getMainEntity() {
        return $this->properties['mainEntity'];
    }

    /**
     * Indicates that the CreativeWork contains a reference to, but is not necessarily about a concept.
     *
     * @param $mentions ThingSchema
     **/
    public function setMentions($mentions) {
        $this->properties['mentions'] = $mentions;

        return $this;
    }

    /**
     * @return ThingSchema
     **/
    public function getMentions() {
        return $this->properties['mentions'];
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
     * The position of an item in a series or sequence of items.
     *
     * @param $position TextSchema|IntegerSchema
     **/
    public function setPosition($position) {
        $this->properties['position'] = $position;

        return $this;
    }

    /**
     * @return TextSchema|IntegerSchema
     **/
    public function getPosition() {
        return $this->properties['position'];
    }

    /**
     * The person or organization who produced the work (e.g. music album, movie, tv/radio series etc.).
     *
     * @param $producer PersonSchema|OrganizationSchema
     **/
    public function setProducer($producer) {
        $this->properties['producer'] = $producer;

        return $this;
    }

    /**
     * @return PersonSchema|OrganizationSchema
     **/
    public function getProducer() {
        return $this->properties['producer'];
    }

    /**
     * The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.
     *
     * @param $provider PersonSchema|OrganizationSchema
     **/
    public function setProvider($provider) {
        $this->properties['provider'] = $provider;

        return $this;
    }

    /**
     * @return PersonSchema|OrganizationSchema
     **/
    public function getProvider() {
        return $this->properties['provider'];
    }

    /**
     * A publication event associated with the item.
     *
     * @param $publication PublicationEventSchema
     **/
    public function setPublication($publication) {
        $this->properties['publication'] = $publication;

        return $this;
    }

    /**
     * @return PublicationEventSchema
     **/
    public function getPublication() {
        return $this->properties['publication'];
    }

    /**
     * The publisher of the creative work.
     *
     * @param $publisher OrganizationSchema|PersonSchema
     **/
    public function setPublisher($publisher) {
        $this->properties['publisher'] = $publisher;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getPublisher() {
        return $this->properties['publisher'];
    }

    /**
     * Link to page describing the editorial principles of the organization primarily responsible for the creation of the CreativeWork.
     *
     * @param $publishingPrinciples URLSchema
     **/
    public function setPublishingPrinciples($publishingPrinciples) {
        $this->properties['publishingPrinciples'] = $publishingPrinciples;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getPublishingPrinciples() {
        return $this->properties['publishingPrinciples'];
    }

    /**
     * The Event where the CreativeWork was recorded. The CreativeWork may capture all or part of the event.
     *
     * @param $recordedAt EventSchema
     **/
    public function setRecordedAt($recordedAt) {
        $this->properties['recordedAt'] = $recordedAt;

        return $this;
    }

    /**
     * @return EventSchema
     **/
    public function getRecordedAt() {
        return $this->properties['recordedAt'];
    }

    /**
     * The place and time the release was issued, expressed as a PublicationEvent.
     *
     * @param $releasedEvent PublicationEventSchema
     **/
    public function setReleasedEvent($releasedEvent) {
        $this->properties['releasedEvent'] = $releasedEvent;

        return $this;
    }

    /**
     * @return PublicationEventSchema
     **/
    public function getReleasedEvent() {
        return $this->properties['releasedEvent'];
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
     * Review of the item.
     *
     * @param $reviews ReviewSchema
     **/
    public function setReviews($reviews) {
        $this->properties['reviews'] = $reviews;

        return $this;
    }

    /**
     * @return ReviewSchema
     **/
    public function getReviews() {
        return $this->properties['reviews'];
    }

    /**
     * Indicates (by URL or string) a particular version of a schema used in some CreativeWork. For example, a document could declare a schemaVersion using a URL such as http://schema.org/version/2.0/ if precise indication of schema version was required by some application. 
     *
     * @param $schemaVersion URLSchema|TextSchema
     **/
    public function setSchemaVersion($schemaVersion) {
        $this->properties['schemaVersion'] = $schemaVersion;

        return $this;
    }

    /**
     * @return URLSchema|TextSchema
     **/
    public function getSchemaVersion() {
        return $this->properties['schemaVersion'];
    }

    /**
     * The Organization on whose behalf the creator was working.
     *
     * @param $sourceOrganization OrganizationSchema
     **/
    public function setSourceOrganization($sourceOrganization) {
        $this->properties['sourceOrganization'] = $sourceOrganization;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getSourceOrganization() {
        return $this->properties['sourceOrganization'];
    }

    /**
     * The textual content of this CreativeWork.
     *
     * @param $text TextSchema
     **/
    public function setText($text) {
        $this->properties['text'] = $text;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getText() {
        return $this->properties['text'];
    }

    /**
     * A thumbnail image relevant to the Thing.
     *
     * @param $thumbnailUrl URLSchema
     **/
    public function setThumbnailUrl($thumbnailUrl) {
        $this->properties['thumbnailUrl'] = $thumbnailUrl;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getThumbnailUrl() {
        return $this->properties['thumbnailUrl'];
    }

    /**
     * Approximate or typical time it takes to work with or through this learning resource for the typical intended target audience, e.g. 'P30M', 'P1H25M'.
     *
     * @param $timeRequired DurationSchema
     **/
    public function setTimeRequired($timeRequired) {
        $this->properties['timeRequired'] = $timeRequired;

        return $this;
    }

    /**
     * @return DurationSchema
     **/
    public function getTimeRequired() {
        return $this->properties['timeRequired'];
    }

    /**
     * Organization or person who adapts a creative work to different languages, regional differences and technical requirements of a target market.
     *
     * @param $translator PersonSchema|OrganizationSchema
     **/
    public function setTranslator($translator) {
        $this->properties['translator'] = $translator;

        return $this;
    }

    /**
     * @return PersonSchema|OrganizationSchema
     **/
    public function getTranslator() {
        return $this->properties['translator'];
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
     * The version of the CreativeWork embodied by a specified resource.
     *
     * @param $version NumberSchema
     **/
    public function setVersion($version) {
        $this->properties['version'] = $version;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getVersion() {
        return $this->properties['version'];
    }

    /**
     * An embedded video object.
     *
     * @param $video VideoObjectSchema
     **/
    public function setVideo($video) {
        $this->properties['video'] = $video;

        return $this;
    }

    /**
     * @return VideoObjectSchema
     **/
    public function getVideo() {
        return $this->properties['video'];
    }

    /**
     * Example/instance/realization/derivation of the concept of this creative work. eg. The paperback edition, first edition, or eBook.
     *
     * @param $workExample CreativeWorkSchema
     **/
    public function setWorkExample($workExample) {
        $this->properties['workExample'] = $workExample;

        return $this;
    }

    /**
     * @return CreativeWorkSchema
     **/
    public function getWorkExample() {
        return $this->properties['workExample'];
    }


}
