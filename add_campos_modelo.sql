-- Adicionar campos marca e modelo_id_modelo na tabela modelo
-- Execute este SQL no phpMyAdmin (selecione o banco concessionaria primeiro)

ALTER TABLE modelo 
ADD COLUMN marca VARCHAR(100) NULL AFTER ano_modelo;

ALTER TABLE modelo 
ADD COLUMN modelo_id_modelo INT NULL AFTER marca;

-- Adicionar chave estrangeira (relacionamento com ele mesmo - opcional)
ALTER TABLE modelo
ADD CONSTRAINT fk_modelo_modelo
FOREIGN KEY (modelo_id_modelo) 
REFERENCES modelo(id_modelo) 
ON DELETE SET NULL 
ON UPDATE CASCADE;
