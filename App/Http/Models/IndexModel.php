<?php
/**
 *
 * KNUT7 K7F (https://marciozebedeu.com/)
 * KNUT7 K7F (tm) : Rapid Development Framework (https://marciozebedeu.com/)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @link      https://github.com/knut7/knu7 for the canonical source repository
 * @copyright (c) 2015.  KNUT7  Software Technologies AO Inc. (https://marciozebedeu.com/)
 * @license   https://marciozebedeu.com/license/new-bsd New BSD License
 * @author    Marcio Zebedeu - artphoweb@artphoweb.com
 * @version   1.0.7
 *
 *
 */

/**
 * Created by PhpStorm.
 * User: marciozebedeu
 * Date: 9/10/19
 * Time: 7:02 PM
 */

namespace app\Http\Models;
use Ballybran\Database\Drives\AbstractDatabaseInterface;
use app\Infrastructure\UserRepository;
class IndexModel {

    private UserRepository $entity;
    public function __construct(AbstractDatabaseInterface $entity ){

        $this->entity = new UserRepository($entity);
    }

    public function getUser() : array {
        return $this->entity->getUser();
    }

    public function getUserById() : array {
        return $this->entity->getUserById();
    }
    

    public function insert($data) {
        $this->entity->insert($data);
    }

    public function save(array $data, $id) {
        var_dump($data);
        return $this->entity->save($data, $id);

    }
    
    public function lastInsertId() {
        return $this->entity->lastInsertId();
    }
    public function delete(int $id ) {
         $this->entity->delete($id);
    }

}