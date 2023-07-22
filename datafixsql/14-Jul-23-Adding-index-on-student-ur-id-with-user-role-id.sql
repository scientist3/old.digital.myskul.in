ALTER TABLE rep_db.student ADD CONSTRAINT student_FK FOREIGN KEY (user_role) REFERENCES rep_db.user_role(ur_id);
CREATE INDEX student_user_id_IDX USING BTREE ON rep_db.student (user_id);
ALTER TABLE rep_db.student MODIFY COLUMN user_role int(11) DEFAULT 5 NOT NULL


CREATE INDEX student_org_idd_IDX USING BTREE ON rep_db.student (org_idd);
CREATE INDEX student_cluster_idd_IDX USING BTREE ON rep_db.student (cluster_idd);
CREATE INDEX student_center_id_IDX USING BTREE ON rep_db.student (center_id);
CREATE INDEX center_center_head_id_IDX USING BTREE ON rep_db.center (center_head_id);
CREATE INDEX center_center_cluster_id_IDX USING BTREE ON rep_db.center (center_cluster_id);
CREATE INDEX user_log_user_id_IDX USING BTREE ON rep_db.user_log (user_id);
CREATE INDEX user_log_user_role_IDX USING BTREE ON rep_db.user_log (user_role);

ALTER TABLE rep_db.student ADD CONSTRAINT student_FK_1 FOREIGN KEY (center_id) REFERENCES rep_db.center(center_id);
ALTER TABLE rep_db.center ADD CONSTRAINT center_FK FOREIGN KEY (center_cluster_id) REFERENCES rep_db.cluster(cluster_id);



--------------------------

-- rep_db.center_type definition

CREATE TABLE `center_type` (
  `ct_id` int(11) NOT NULL AUTO_INCREMENT,
  `ct_name` varchar(100) NOT NULL,
  `ct_age_group` varchar(20) NOT NULL,
  `ct_status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ct_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


ALTER TABLE rep_db.center ADD center_type_id INT NOT NULL;
CREATE INDEX center_center_type_id_IDX USING BTREE ON rep_db.center (center_type_id);
ALTER TABLE rep_db.center MODIFY COLUMN center_type_id int(11) NULL;



UPDATE rep_db.center
	SET center_head_id=NULL
	WHERE center_id in (SELECT center_id FROM center WHERE `center_head_id` NOT IN (SELECT user_id FROM student))
	
ALTER TABLE rep_db.center ADD CONSTRAINT center_FK_1 FOREIGN KEY (center_head_id) REFERENCES rep_db.student(user_id);



ALTER TABLE rep_db.organisation MODIFY COLUMN org_head_id INT NOT NULL;

ALTER TABLE `organisation` ADD CONSTRAINT `org_head_user_id_FK` FOREIGN KEY (`org_head_id`) REFERENCES `student`(`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;



ALTER TABLE `student` DROP FOREIGN KEY `student_FK`; ALTER TABLE `student` ADD CONSTRAINT `student_user_role_FK` FOREIGN KEY (`user_role`) REFERENCES `user_role`(`ur_id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `student` DROP FOREIGN KEY `student_ibfk_1`; ALTER TABLE `student` ADD CONSTRAINT `student_org_id_FK` FOREIGN KEY (`org_idd`) REFERENCES
	

SELECT user_id FROM student WHERE center_id  NOT IN (SELECT center_id  FROM center)

UPDATE rep_db.student SET create_date =NULL WHERE create_date ='0000-00-00'
UPDATE rep_db.student SET update_date=NULL WHERE update_date  ='0000-00-00'


ALTER TABLE rep_db.student ADD CONSTRAINT student_center_idFK FOREIGN KEY (center_id) REFERENCES rep_db.center(center_id);
	
	