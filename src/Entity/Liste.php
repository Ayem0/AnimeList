<?php

namespace App\Entity;

use App\Repository\ListeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListeRepository::class)]
class Liste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'listes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user_id = null;

    #[ORM\ManyToMany(targetEntity: Anime::class)]
    private Collection $anime_id;

    public function __construct()
    {
        $this->anime_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return Collection<int, Anime>
     */
    public function getAnimeId(): Collection
    {
        return $this->anime_id;
    }

    public function addAnimeId(Anime $animeId): static
    {
        if (!$this->anime_id->contains($animeId)) {
            $this->anime_id->add($animeId);
        }

        return $this;
    }

    public function removeAnimeId(Anime $animeId): static
    {
        $this->anime_id->removeElement($animeId);

        return $this;
    }
}
