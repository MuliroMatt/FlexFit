CREATE DATABASE FlexFit;
USE FlexFit;

CREATE TABLE administradores(
    adm_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    adm_nome VARCHAR(20) NOT NULL,
    adm_sobrenome VARCHAR(50) NOT NULL,
    adm_email VARCHAR(50) NOT NULL,
    adm_senha VARCHAR(255) NOT NULL,
    adm_status CHAR(1) NOT NULL
);

CREATE TABLE usuarios(
    usu_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usu_nome VARCHAR(20) NOT NULL,
    usu_sobrenome VARCHAR(50) NOT NULL,
    usu_email VARCHAR(60) NOT NULL,
    usu_senha VARCHAR(255) NOT NULL,
    usu_funcao CHAR(1),
    usu_img LONGBLOB
);

CREATE TABLE instrutores(
    instr_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    instr_cpf VARCHAR(20) NOT NULL,
    instr_telefone VARCHAR(14) NOT NULL,
    instr_turno ENUM('Manhã', 'Tarde', 'Noite') NOT NULL,
    instr_sexo ENUM('Masculino','Feminino') NULL,
    instr_status CHAR(1) NOT NULL,
    fk_usu_id INT NOT NULL,
    FOREIGN KEY (fk_usu_id) REFERENCES usuarios(usu_id)
);

CREATE TABLE alunos(
    al_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  
    al_cpf VARCHAR(20) NOT NULL,
    al_dataNasc DATE NOT NULL,
    al_sexo ENUM ('Masculino', 'Feminino', 'Outro') NULL,
    al_endereco VARCHAR(100) NOT NULL,
    al_telefone VARCHAR(14) NOT NULL,
    fk_usu_id INT NOT NULL,
    fk_instr_id INT,
    al_status CHAR(1),

    FOREIGN KEY (fk_usu_id) REFERENCES usuarios(usu_id),
    FOREIGN KEY (fk_instr_id) REFERENCES instrutores(instr_id)
);

CREATE TABLE aparelhos(
    apa_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    apa_nome VARCHAR(30) NOT NULL,
    apa_categoria ENUM('Cardio', 'Abdômen e Lombar', 'Superiores', 'Inferiores' ),
    apa_nivel ENUM('Básico', 'Intermediário', 'Avançado') NOT NULL,
    apa_quantidade INT NOT NULL,
    apa_status CHAR(1)
);

CREATE TABLE treinos(
    tr_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tr_dia ENUM('Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo'),
    -- fk_instr_id INT NOT NULL,
    fk_al_id INT NOT NULL,
    -- FOREIGN KEY (fk_instr_id) REFERENCES instrutores(instr_id),
    FOREIGN KEY (fk_al_id) REFERENCES alunos(al_id)
);

CREATE TABLE exercicios(
    ex_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ex_nome VARCHAR(30) NOT NULL,
    ex_video VARCHAR(255),
    ex_desc TEXT,
    fk_apa_id INT NOT NULL,
    FOREIGN KEY(fk_apa_id) REFERENCES aparelhos(apa_id)
);

CREATE TABLE exercicios_treino(
    et_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    -- et_nome VARCHAR(100) NOT NULL,
    et_tempo TIME,
    et_series INT,
    et_repeticao INT,
    -- fk_apa_id INT NOT NULL,
    fk_tr_id INT NOT NULL,
    fk_ex_id INT NOT NULL,
    FOREIGN KEY (fk_tr_id) REFERENCES treinos (tr_id),
    FOREIGN KEY (fk_ex_id) REFERENCES exercicios (ex_id)
    -- FOREIGN KEY (fk_apa_id) REFERENCES aparelhos (apa_id)
);




INSERT INTO administradores (adm_nome, adm_sobrenome, adm_email, adm_senha, adm_status)
VALUES ('Admin', 'FlexFit', 'admin@flexfit', '202cb962ac59075b964b07152d234b70', 's');

INSERT INTO usuarios (usu_nome, usu_sobrenome, usu_email, usu_senha, usu_funcao, usu_img) 
VALUES ('John', 'Doe', 'john@example.com', '202cb962ac59075b964b07152d234b70', 'i', NULL);

INSERT INTO usuarios (usu_nome, usu_sobrenome, usu_email, usu_senha, usu_funcao, usu_img) 
VALUES ('Jane', 'Smith', 'jane@example.com', '202cb962ac59075b964b07152d234b70', 'i', NULL);

INSERT INTO usuarios (usu_nome, usu_sobrenome, usu_email, usu_senha, usu_funcao, usu_img) 
VALUES ('Alice', 'Johnson', 'alice@example.com', '202cb962ac59075b964b07152d234b70', 'a', NULL);

INSERT INTO usuarios (usu_nome, usu_sobrenome, usu_email, usu_senha, usu_funcao, usu_img) 
VALUES ('Bob', 'Brown', 'bob@example.com', '202cb962ac59075b964b07152d234b70', 'a', NULL);

INSERT INTO instrutores (instr_cpf, instr_telefone, instr_turno, instr_sexo, instr_status, fk_usu_id) 
VALUES ('123.456.789-10', '(123) 456-7890', 'Manhã', 'Masculino', 's', 1);

INSERT INTO instrutores (instr_cpf, instr_telefone, instr_turno, instr_sexo, instr_status, fk_usu_id) 
VALUES ('987.654.321-00', '(987) 654-3210', 'Tarde', 'Feminino', 's', 2);

INSERT INTO alunos (al_cpf, al_dataNasc, al_sexo, al_endereco, al_telefone, fk_usu_id, fk_instr_id, al_status) 
VALUES ('111.222.333-44', '2000-05-15', 'Masculino', '123 Main Street, City, Country', '(111) 222-3333', 3, 1, 's');

INSERT INTO alunos (al_cpf, al_dataNasc, al_sexo, al_endereco, al_telefone, fk_usu_id, fk_instr_id, al_status) 
VALUES ('555.666.777-88', '1998-10-20', 'Feminino', '456 Elm Street, City, Country', '(555) 666-7777', 4, 2, 's');

INSERT INTO aparelhos (apa_nome, apa_categoria, apa_nivel, apa_quantidade, apa_status) 
VALUES ('Esteira', 'Cardio', 'Básico', 5, 's'),
       ('Bicicleta Ergométrica', 'Cardio', 'Intermediário', 3, 's');

INSERT INTO aparelhos (apa_nome, apa_categoria, apa_nivel, apa_quantidade, apa_status) 
VALUES ('Roda Abdominal', 'Abdômen e Lombar', 'Básico', 4, 's'),
       ('Prancha Abdominal', 'Abdômen e Lombar', 'Intermediário', 2, 's');

INSERT INTO aparelhos (apa_nome, apa_categoria, apa_nivel, apa_quantidade, apa_status) 
VALUES ('Haltere', 'Superiores', 'Intermediário', 6, 's'),
       ('Barra Fixa', 'Superiores', 'Avançado', 3, 's');

INSERT INTO aparelhos (apa_nome, apa_categoria, apa_nivel, apa_quantidade, apa_status) 
VALUES ('Leg Press', 'Inferiores', 'Intermediário', 4, 's'),
       ('Cadeira Extensora', 'Inferiores', 'Avançado', 2, 's');

INSERT INTO exercicios (ex_nome, ex_video, ex_desc, fk_apa_id)
VALUES ('Supino com Barra', 'https://www.youtube.com/embed/WwXS2TeFmeg?si=R3OmD9x3THUuwlyG', NULL, 6);

INSERT INTO exercicios (ex_nome, ex_video, ex_desc, fk_apa_id)
VALUES ('Barra Fixa ou Puxada na Polia Alta', 'https://www.youtube.com/embed/7cCiQUdIXWw?si=_ntBwy0QvcEFFeKr', NULL, 6);

INSERT INTO exercicios (ex_nome, ex_video, ex_desc, fk_apa_id)
VALUES ('Desenvolvimento de Ombros com Halteres', 'https://www.youtube.com/embed/Nu1lKrS-Vvw?si=q0rgW-R9SXSGm98U', NULL, 5);

INSERT INTO exercicios (ex_nome, ex_video, ex_desc, fk_apa_id)
VALUES ('Rosca Direta com Barra ou Halteres', 'https://www.youtube.com/embed/c__3LAiXYOk?si=Or-o_gHTZQ4BAUqv', NULL, 5);

INSERT INTO exercicios (ex_nome, ex_video, ex_desc, fk_apa_id)
VALUES ('Tríceps Pulley ou Tríceps Francês com Halteres', 'https://www.youtube.com/embed/U9REU8VoNww?si=mVxYBgDybzKyKeLK', NULL, 5);

