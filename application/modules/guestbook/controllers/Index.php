<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Guestbook\Controllers;

use Guestbook\Mappers\Guestbook as GuestbookMapper;
use Ilch\Date as IlchDate;

defined('ACCESS') or die('no direct access');

class Index extends \Ilch\Controller\Frontend
{
    public function indexAction()
    {
        $this->getLayout()->setHmenu(array('guestbook' => ''));
        $guestbookMapper = new GuestbookMapper();
        $this->getView()->set('entries', $guestbookMapper->getEntries(array('setfree' => 1)));
    }

    public function newEntryAction()
    {
        $this->getLayout()->setHmenu
        (
            array
            (
                'guestbook' => array('action' => 'index'),
                'entry' => ''
            )
        );

        $guestbookMapper = new GuestbookMapper();
        $ilchdate = new IlchDate;

        if ($this->getRequest()->isPost()) {
            $name = $this->getRequest()->getPost('name');
            $email = trim($this->getRequest()->getPost('email'));
            $text = trim($this->getRequest()->getPost('text'));
            $homepage = trim($this->getRequest()->getPost('homepage'));

            if (empty($text)) {
                $this->addMessage('missingText', 'danger');
            } elseif(empty($name)) {
                $this->addMessage('missingName', 'danger');
            } else {
                $model = new \Guestbook\Models\Entry();
                $model->setName($name);
                $model->setEmail($email);
                $model->setText($text);
                $model->setHomepage($homepage);
                $model->setDatetime($ilchdate->toDb());
                $model->setFree($this->getConfig()->get('gbook_autosetfree'));
                $guestbookMapper->save($model);

                if ($this->getConfig()->get('gbook_autosetfree') == 0 ) {
                    $this->addMessage('check', 'success');
                }

                $this->redirect(array('action' => 'index'));
            }
        }
    }
}
