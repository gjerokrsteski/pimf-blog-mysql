<?php
namespace MyFirstBlog\DataMapper;
use Pimf\DataMapper\Base;

class Entry extends Base
{
  /**
   * @return Entry[]
   */
  public function getAll()
  {
    $sth = $this->pdo->prepare(
      'SELECT * FROM blog'
    );

    $sth->setFetchMode(
      \PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,
      '\MyFirstBlog\Model\Entry',
      array('title', 'content')
    );

    $sth->execute();

    return $sth->fetchAll();
  }

  /**
   * @param int $id
   *
   * @return mixed|object
   * @throws \OutOfRangeException
   */
  public function find($id)
  {
    if (true === $this->identityMap->hasId($id)) {
      return $this->identityMap->getObject($id);
    }

    $sth = $this->pdo->prepare(
      'SELECT * FROM blog WHERE id = :id'
    );

    $sth->bindValue(':id', $id, \PDO::PARAM_INT);

    $sth->setFetchMode(
      \PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,
      '\MyFirstBlog\Model\Entry',
      array('title', 'content')
    );

    $sth->execute();

    // let pdo fetch the User instance for you.
    $blogEntry = $sth->fetch();

    if ($blogEntry === false) {
      throw new \OutOfRangeException('no entry with id='.$id);
    }

    // set the protected id of user via reflection.
    $blogEntry = $this->reflect($blogEntry, $id);

    $this->identityMap->set($id, $blogEntry);

    return $blogEntry;
  }

  /**
   * @param \MyFirstBlog\Model\Entry $blogEntry
   *
   * @return int
   * @throws \RuntimeException
   */
  public function insert(\MyFirstBlog\Model\Entry $blogEntry)
  {
    if (true === $this->identityMap->hasObject($blogEntry)) {
      throw new \RuntimeException('Object has an ID, cannot insert.');
    }

    $sth = $this->pdo->prepare(
      "INSERT INTO blog (title, content) VALUES (:title, :content)"
    );

    $sth->bindValue(':title', $blogEntry->getTitle());
    $sth->bindValue(':content', $blogEntry->getContent());
    $sth->execute();

    $id = (int)$this->pdo->lastInsertId();

    $blogEntry = $this->reflect($blogEntry, $id);

    $this->identityMap->set($id, $blogEntry);

    return $id;
  }

  /**
   * @param \MyFirstBlog\Model\Entry $blogEntry
   *
   * @return bool
   */
  public function update(\MyFirstBlog\Model\Entry $blogEntry)
  {
    $sth = $this->pdo->prepare(
      "UPDATE blog SET title = :title, content = :content WHERE id = :id"
    );

    $sth->bindValue(':title', $blogEntry->getTitle());
    $sth->bindValue(':content', $blogEntry->getContent());
    $sth->bindValue(':id', $blogEntry->getId(), \PDO::PARAM_INT);

    $sth->execute();

    if ($sth->rowCount() == 1) {
      return true;
    }

    return false;
  }

  /**
   * @param int $id
   * @return bool
   */
  public function delete($id)
  {
    $sth = $this->pdo->prepare(
      "DELETE FROM blog WHERE id = :id"
    );

    $sth->bindValue(':id', $id, \PDO::PARAM_INT);
    $sth->execute();

    if ($sth->rowCount() == 0) {
      return false;
    }

    return true;
  }
}
