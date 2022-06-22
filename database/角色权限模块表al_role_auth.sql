DROP TABLE IF EXISTS  `al_role_auth`;
CREATE TABLE `al_role_auth` (
  `auth_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `pid` int unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `controller` char(20) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` char(20) NOT NULL DEFAULT '' COMMENT '方法',
  `parm` text COMMENT '参数',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '权限名称',
  `sort` smallint(4) unsigned NOT NULL DEFAULT '0' COMMENT '菜单排序-降序',
  `is_menu` bit NOT NULL DEFAULT 0 COMMENT '是否在列表导航中显示(0否、1是)',
  `is_parent` bit NOT NULL DEFAULT 0 COMMENT '是否存在下级子菜单(0否、1是)',
  `is_blank` bit NOT NULL DEFAULT 0 COMMENT '是否打开弹窗类型(0否、1是)',
  `state` bit NOT NULL DEFAULT 0 COMMENT '是否启用(0不启用 1启用)',
  `lay_icon` varchar(50) NOT NULL DEFAULT 0 COMMENT 'layui图标类名',

  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='角色权限表';

insert into `al_role_auth`(`auth_id`,`pid`,`controller`,`action`,`parm`,`title`,`sort`,`is_menu`,`is_parent`,`is_blank`,`state`,`lay_icon`) values

/*-权限模板-*/
-- (1,0,'控制器名','方法名','权限名称','菜单排序','是否显示在导航中','是否存在下级菜单','是否打开为弹窗','是否启用','layui图标')


(1,0,'','','','基础设置',1,1,1,0,1,''),
    (101,1,'','','','用户管理',0,1,1,0,1,'layui-icon-user'),
        (1011,101,'User','user_list','','用户列表',2,1,1,0,1,''),
            (10111,1011,'User','user_list','','查看用户',0,0,0,0,1,''),
            (10113,1011,'User','edit','','修改用户',0,0,0,0,1,''),
            (10114,1011,'User','delete','','删除用户',0,0,0,0,1,''),

        (1012,101,'User','add','','添加用户',1,1,0,1,1,''),
        

    (102,1,'','','','角色管理',0,1,1,0,1,'layui-icon-component'),
        (1021,102,'Role','role_list','','角色列表',2,1,1,0,1,''),    
            (10211,1021,'Role','role_list','','查看角色',0,0,0,0,1,''),
            (10213,1021,'Role','edit','','修改角色',0,0,0,0,1,''),
            (10214,1021,'Role','delete','','删除角色',0,0,0,0,1,''),
        
        (1022,102,'Role','add','','添加角色',1,1,0,1,1,''),


    (103,1,'','','','工程项目管理',0,1,1,0,1,'layui-icon-app'),
        (1031,103,'Item','item_list','','工程项目列表',2,1,1,0,1,''),
            (10311,1031,'Item','item_list','','查看工程项目',0,0,0,0,1,''),
            (10313,1031,'Item','edit','','修改工程项目',0,0,0,0,1,''),
            (10314,1031,'Item','delete','','删除工程项目',0,0,0,0,1,''),
            (10315,1031,'Item','item_user','','人员列表',0,0,1,0,1,''),
                (103151,10315,'Item','item_user','','查看工程项目',0,0,0,0,1,''),


        (1032,103,'Item','add','','添加工程项目',1,1,0,1,1,''),
	(104,1,'','','','基础模块管理',0,1,1,0,1,'layui-icon-app'),
		(1041,104,'Mod','mod_list','','基础模块列表',2,1,1,0,1,''),
			 (10411,1041,'Mod','add','','添加模块',0,0,0,0,1,''),
			 (10412,1041,'Mod','edit','','编辑模块',0,0,0,0,1,''),
			 (10413,1041,'Mod','delete','','删除模块',0,0,0,0,1,''),
		
			 (10431,1041,'Mod','add_mod_attr','','添加模块属性',0,0,0,0,1,''),
			 (10432,1041,'Mod','edit_mod_attr','','编辑模块属性',0,0,0,0,1,''),
			 (10433,1041,'Mod','del_mod_attr','','删除模块属性',0,0,0,0,1,''),
		(1042,104,'Mod','add','','添加基础模块',1,1,0,1,1,''),
		(1043,104,'Mod','mod_attr_list','','模块属性列表',2,1,0,0,1,''),
		
		(1044,104,'Mod','add_mod_attr','','添加模块属性',1,1,0,1,1,''),
(2,0,'','','','数据管理',1,1,1,0,1,''),
	(201,2,'','','','基本信息',0,1,1,0,1,'layui-icon-user'),
		(2011,201,'First','user_list','','基本信息',0,1,0,0,1,'layui-icon-user'),
	(202,2,'','','','薪资管理',0,1,1,0,1,'layui-icon-user'),
		(2021,202,'Salary','user_list','','薪资列表',0,1,0,0,1,'layui-icon-user')
	
		
;