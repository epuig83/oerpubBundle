<?php

namespace oerpub\oerpubBundle\Model;

class OerpubEvents
{
    /**
     * @var string Title/label of the calendar event.
     */
    protected $title;
    /**
     * @var string content of HTML.
     */
    protected $content;
    /**
     * @var \DateTime DateTime object of the event start date/time.
     */
    protected $createDatetime;
    /**
     * @var \DateTime DateTime object of the event end date/time.
     */
    protected $modifyDatetime;


    public function __construct()
    {
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function setCreateDatetime(\DateTime $create)
    {
        $this->createDatetime = $create;
    }
    public function getCreateDatetime()
    {
        return $this->createDatetime;
    }
    public function setModifyDatetime(\DateTime $modify)
    {
        $this->modifyDatetime = $modify;
    }
    public function getModifyDatetime()
    {
        return $this->modifyDatetime;
    }
    public function toArray()
    {
        return array(
            'id'                    => $this->id,
            'title'                 => $this->title,
            'create'                => $this->createDatetime->format("Y-m-d\TH:i:sP"),
            'modify'                => $this->modifyDatetime->format("Y-m-d\TH:i:sP"),
            'content'               => $this->content
        );
    }
}