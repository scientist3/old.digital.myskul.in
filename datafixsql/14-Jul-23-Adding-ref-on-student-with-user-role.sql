ALTER TABLE rep_db.student ADD CONSTRAINT student_FK FOREIGN KEY (user_role) REFERENCES rep_db.user_role(ur_id);
