-- Path: public/finance/sql/cp_audit.sql
CREATE TABLE tbl_fin_audit (

    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_name VARCHAR(255),
    log_action VARCHAR(255),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tbl_fin_audit (employee_name, log_action) VALUES ('Tagle, Aries', 'Log in');
INSERT INTO tbl_fin_audit (employee_name, log_action) VALUES ('Tagle, Aries', 'Log out');

SELECT * FROM tbl_fin_audit;