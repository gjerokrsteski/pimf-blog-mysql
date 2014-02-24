<?php

namespace MyFirstBlog\Model;
use Pimf\Model\AsArray;

/**
 * Class for data access
 */
class Entry extends AsArray
{
  protected $id;

  protected $title;

  protected $content;

  public function __construct($title, $content)
  {
    $this->content = $content;
    $this->title   = $title;
  }

  public function getContent()
  {
    return $this->content;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getTitle()
  {
    return $this->title;
  }
}
