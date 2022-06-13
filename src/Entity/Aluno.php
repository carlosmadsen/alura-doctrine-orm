<?php

namespace Alura\Doctrine\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Entity\Telefone;

/**
 * @Entity
 */
class Aluno {
	/**
	 * @Id
	 * @GeneratedValue
	 * @Column(type="integer")
	 */
	private $id;
	/**
	 * @Column(type="string")
	 */
	private $nome;
	/**
	 * @OneToMany(targetEntity="Telefone", mappedBy="Aluno")
	 */
	private $telefones;

	public function __construct() {
		$this->telefones = new ArrayCollection();
	}

	public function getId(): int {
		return $this->id;
	}

	public function getNome(): string {
		return $this->nome;
	}

	public function setNome(string $nome): self {
		$this->nome = $nome;
		return $this;
	}
	
	public function addTelefone(Telefone $telefone) {
		$this->telefones->add($telefone);
	}

	public function getTelefones(): Collection {
		return $this->telefones;
	}
}