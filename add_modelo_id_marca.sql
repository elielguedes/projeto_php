-- Adicionar campo modelo_id na tabela marca
-- Execute este SQL no phpMyAdmin (selecione o banco concessionaria ANTES)

-- Adicionar a coluna modelo_id na tabela marca se não existir
ALTER TABLE marca 
ADD COLUMN modelo_id INT NULL AFTER nome_marca;

-- Adicionar a chave estrangeira
ALTER TABLE marca
ADD CONSTRAINT fk_marca_modelo_id
FOREIGN KEY (modelo_id) 
REFERENCES modelo(id_modelo) 
ON DELETE SET NULL 
ON UPDATE CASCADE;

-- Atualizar registros existentes para apontar para o primeiro modelo (opcional)
UPDATE marca SET modelo_id = (SELECT id_modelo FROM modelo LIMIT 1) WHERE modelo_id IS NULL;
