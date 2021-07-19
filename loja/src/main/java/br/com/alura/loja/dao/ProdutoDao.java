package br.com.alura.loja.dao;

import java.math.BigDecimal;
import java.util.List;

import javax.persistence.EntityManager;

import br.com.alura.loja.modelo.Produto;

public class ProdutoDao {

	private EntityManager em;

	public ProdutoDao(EntityManager em) {
		super();
		this.em = em;
	}

	public void cadastrar(Produto produto) {
		this.em.persist(produto);
	}

	public void remover(Produto produto) {
		produto = em.merge(produto);
		this.em.remove(produto);
	}

	public Produto buscarPorId(Long id) {
		return this.em.find(Produto.class, id);
	}

	public List<Produto> buscarTodos() {
		// JQPL
		String jpql = "SELECT p FROM Produto as p";
		return this.em.createQuery(jpql, Produto.class).getResultList();
	}

	public List<Produto> buscarPorNome(String nome) {
		// JQPL
		// Usar o nome do atributo e da classe, e NAO da coluna ou tabela
		String jpql = "SELECT p FROM Produto as p WHERE p.nome = :nome";

		return this.em.createQuery(jpql, Produto.class).setParameter("nome", nome).getResultList();
	}

	public List<Produto> buscarPorNomeDaCategoria(String categoria) {
		// JQPL
		// Usar o nome do atributo e da classe, e NAO da coluna ou tabela
		String jpql = "SELECT p FROM Produto as p WHERE p.categoria.nome = :categoria";

		return this.em.createQuery(jpql, Produto.class).setParameter("categoria", categoria).getResultList();
	}

	public BigDecimal buscarPrecoDoProdutoComNome(String nome) {
		// JQPL
		// Usar o nome do atributo e da classe, e NAO da coluna ou tabela
		String jpql = "SELECT p.preco FROM Produto as p WHERE p.nome = :nome";

		return this.em.createQuery(jpql, BigDecimal.class).setParameter("nome", nome).getSingleResult();
	}
}
