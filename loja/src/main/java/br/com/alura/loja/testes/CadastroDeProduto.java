package br.com.alura.loja.testes;


import java.util.List;

import javax.persistence.EntityManager;

import br.com.alura.loja.dao.ProdutoDao;
import br.com.alura.loja.modelo.Categoria;
import br.com.alura.loja.modelo.Produto;
import br.com.alura.loja.util.JPAUtil;

public class CadastroDeProduto {

	public static void main(String[] args) {
		cadastrarProduto();
		
		EntityManager em = JPAUtil.getEntityManager();
		
		ProdutoDao produtoDao = new ProdutoDao(em);
		Produto produto = produtoDao.buscarPorId(4l);
		System.out.println(produto.getNome());
		
		List<Produto> produtos = produtoDao.buscarTodos();
		produtos.forEach(p -> System.out.println(p.getNome()));
	}

	private static void cadastrarProduto() {
		Categoria celulares = new Categoria("Celulares");

		EntityManager em = JPAUtil.getEntityManager();

		em.getTransaction().begin();

		em.persist(celulares);
		celulares.setNome("Mudança 1");
		
		em.flush();
		em.clear();
		
		// Ele retorna o objeto e nao "atualiza" o objeto ja criado
		// Por isso temos que "atualizar a variavel"
		celulares = em.merge(celulares);
		
		
		celulares.setNome("Mudança 2");
		em.flush();
		
		em.remove(celulares);
		em.flush();
		
		em.clear();
	}

}
