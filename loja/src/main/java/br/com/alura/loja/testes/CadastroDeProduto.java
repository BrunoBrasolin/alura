package br.com.alura.loja.testes;


import javax.persistence.EntityManager;
import br.com.alura.loja.modelo.Categoria;
import br.com.alura.loja.util.JPAUtil;

public class CadastroDeProduto {

	public static void main(String[] args) {
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
		em.clear();
	}

}
