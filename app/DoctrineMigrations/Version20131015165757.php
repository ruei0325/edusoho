<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20131015165757 extends AbstractMigration
{
    public function up(Schema $schema)
    {
   //      $this->addSql(
   //          "CREATE TABLE `upgrade_logs` (
			//   `id` int(11) NOT NULL AUTO_INCREMENT,
			//   `remoteId` int(11) NOT NULL COMMENT 'packageId',
			//   `installedId` int(11) DEFAULT NULL COMMENT '本地已安装id',
			//   `ename` varchar(32) NOT NULL COMMENT '名称',
			//   `cname` varchar(32) NOT NULL COMMENT '中文名称',
			//   `fromv` varchar(32) DEFAULT NULL COMMENT '初始版本',
			//   `tov` varchar(32) NOT NULL COMMENT '目标版本',
			//   `type` smallint(6) NOT NULL COMMENT '升级类型',
			//   `dbBackPath` text NOT NULL COMMENT '数据库备份文件',
			//   `srcBackPath` text NOT NULL COMMENT '源文件备份地址',
			//   `status` varchar(32) NOT NULL COMMENT '状态(ROLLBACK,ERROR,SUCCESS,RECOVERED)',
			//   `logtime` int(11) NOT NULL COMMENT '升级时间',
			//   `uid` int(10) unsigned NOT NULL COMMENT 'uid',
			//   `ip` varchar(32) DEFAULT NULL COMMENT 'ip',
			//   `reason` text COMMENT '失败原因',
  	// 		  PRIMARY KEY (`id`)
			// ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='本地升级日志表' ;"
   //      );
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs

    }
}
