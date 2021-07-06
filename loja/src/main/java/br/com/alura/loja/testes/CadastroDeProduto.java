package br.com.alura.loja.testes;

import java.math.BigDecimal;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

import br.com.alura.loja.modelo.Produto;

public class CadastroDeProduto {

	public static void main(String[] args) {
		Produto celular = new Produto();
		celular.setNome("Moto G7 Play");
		celular.setDescricao("Não compre este celular");
		celular.setPreco(new BigDecimal("550"));

		EntityManagerFactory factory = Persistence.createEntityManagerFactory("loja");
		EntityManager em = factory.createEntityManager();
		
		em.getTransaction().begin();
		em.persist(celular);
		em.getTransaction().commit();
		em.close();
	}

}
