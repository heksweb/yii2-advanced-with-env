<?php

use admin\models\Admin;
use yii\db\Migration;

class m130524_201442_add_admin_table extends Migration
{
    /**
     * @throws \yii\base\Exception
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%admin}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'verification_token' => $this->string()->defaultValue(null),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        //Create base admin
        $admin = new Admin();
        $admin->username = $_ENV['ADMIN_NAME'];
        $admin->email    = $_ENV['ADMIN_EMAIL'];
        $admin->setPassword($_ENV['ADMIN_DEFAULT_PASSWORD']);
        $admin->generateAuthKey();
        $admin->generateEmailVerificationToken();
        $admin->status = Admin::STATUS_ACTIVE;
        $admin->save();

    }

    public function down()
    {
        $this->dropTable('{{%admin}}');
    }
}
