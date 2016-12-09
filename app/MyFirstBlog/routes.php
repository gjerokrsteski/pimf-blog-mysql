<?php
return array(
    new \Pimf\Route('/', array('controller' => 'blog', 'action' => 'listentries')),
    new \Pimf\Route(':controller/:action(/:id)', array('controller' => 'blog')),
);