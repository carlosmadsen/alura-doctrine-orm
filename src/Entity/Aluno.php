<?php

namespace Alura\Doctrine\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Entity\Curso;

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
 	 * @OneToMany(targetEntity="Telefone", mappedBy="aluno", cascade={"remove", "persist"})
 	 */
	private $telefones;
	/**
     * @ManyToMany(targetEntity="Curso", mappedBy="alunos", cascade={"persist"})
     */
    private $cursos;

	public function __construct() {
		$this->telefones = new ArrayCollection();
		$this->cursos = new ArrayCollection();
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
		$telefone->setAluno($this);
		$this->telefones->add($telefone);		
	}

	public function getTelefones(): Collection {
		return $this->telefones;
	}

	public function addCurso(Curso $curso) {
	    if ($this->cursos->contains($curso)) {
    	    return $this;
    	}
		$this->cursos->add($curso);
    	$curso->addAluno($this);
	    return $this;
	}

	public function getCursos(): Collection {
    	return $this->cursos;
	}
}
