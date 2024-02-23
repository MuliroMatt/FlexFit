CREATE DATABASE FlexFit;
USE FlexFit;


--ADM's
CREATE TABLE administrador(
    adm_id INT NOT  NULL AUTO_INCREMENT PRIMARY KEY,
    adm_nome VARCHAR(50) NOT NULL,
    adm_email VARCHAR(50) NOT NULL,
    adm_senha VARCHAR(30) NOT NULL,
    adm_cargo VARCHAR (30) NOT NULL,
    adm_status CHAR(1) NOT NULL
);

--INSTRUTORES
CREATE TABLE instrutor(
    instr_id INT NOT NULL AUTO INCREMENT PRIMARY KEY,
    instr_nome  VARCHAR(60) NOT NULL,
    instr_email VARCHAR(50) NOT NULL,
    instr_senha VARCHAR(30) NOT NULL,
    instr_cpf BIGINT(20) NOT NULL,
    instr_telefone VARCHAR(14) NOT NULL,
    instr_turno ENUM('Manhã', 'Tarde', 'Noite') NOT NULL,
    instr_sexo ENUM('Masculino','Feminino') NULL,
    instr_cargo VARCHAR(30) NULL,
    instr_status CHAR(1) NOT NULL,
    fk_adm_id NOT NULL
);

--ALUNOS
CREATE TABLE alunos(
    al_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY.
    al_nome VARCHAR(60) NOT NULL,
    al_email VARCHAR(50) NOT NULL,
    al_senha VARCHAR (30) NOT NULL,
    al_cpf BIGINT(20) NOT NULL,
    al_idade VARCHAR(10) NOT NULL,
    al_dataNasc DATE NOT NULL,
    al_sexo ENUM ('Masculino', 'Feminino') NULL,
    al_endereco VARCHAR(100) NOT NULL,
    al_telefone VARCHAR(14) NOT NULL,
    al_peso DECIMAL(8,2) NOT NULL,
    al_altura DECIMAL(7,2) NOT NULL,
    al_experiencia TEXT NULL,
    al_objetivo TEXT NULL,
    al_status CHAR(1) NOT NULL,
    fk_instr_id NOT NULL,
    fk_adm_id NOT NULL
);

--APARELHOS
CREATE TABLE aparelhos(
    apa_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    apa_nome VARCHAR(30) NOT NULL,
    apa_categoria ENUM('Cardio', 'Abdômen e Lombar', 'Superiores', 'Inferiores' ),
    apa_nivel ENUM('Básico', 'Intermediário', 'Avançado') NOT NULL,
    apa_quantidade INT NOT NULL,
    fk_instr_id NOT NULL,
    fk_al_id NOT NULL --chave estrangeira para a tabela de Aluno
);

--TREINOS
CREATE TABLE treinos(
    treino_id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    treino_dia ENUM('Segunda-feira', 'Terça-feira', 'Quarta-feira',
    'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo'),
    treino_tempo  TIME NOT NULL,
    treino_series  INT NOT NULL,
    treino_repeticao INT NOT NULL,
    fk_instr_id NOT NULL,
    fk_al_id NOT NULL
);

--CHAVES ESTRANGEIRAS
--INSTRUTOR
ALTER TABLE instrutores ADD CONSTRAINT fk_adm_id_instr
    FOREIGN KEY (fk_adm_id) REFERENCES administradores(adm_id);

--ALUNO
ALTER TABLE alunos ADD CONSTRAINT fk_instr_id_al
    FOREIGN KEY (fk_instr_id) REFERENCES instrutores(instr_id);
ALTER TABLE alunos ADD CONSTRAINT fk_adm_id_al
FOREIGN KEY (fk_adm_id) REFERENCES administradores(adm_id);

--APARELHO
ALTER TABLE aparelhos ADD CONSTRAINT fk_instr_id_apa
    FOREIGN KEY (fk_instr_id) REFERENCES instrutores(instr_id);
ALTER TABLE aparelhos ADD CONSTRAINT fk_al_id_apa
    FOREIGN KEY (fk_al_id) REFERENCES aluno(al_id);

--TREINO
ALTER TABLE treinos ADD CONSTRAINT fk_instr_id_treino
    FOREIGN KEY (fk_instr_id) REFERENCES instrutores(instr_id);