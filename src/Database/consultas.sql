-- consulta tabela endereco
SELECT en.idEndereco,c.nome as cidade, en.bairro, en.rua, en.numero, est.nome as estado, en.telefone as telefone
FROM endereco AS en
JOIN cidade AS c ON en.idCidade = c.idCidade
JOIN estado AS est ON en.idEstado = est.idEstado

-- consulta 2
