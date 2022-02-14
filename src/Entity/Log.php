<?php

namespace App\Entity;

use App\Repository\LogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogRepository::class)]
class Log
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 128)]
    private $filename;

    #[ORM\Column(type: 'string', length: 16)]
    private $service_name;

    #[ORM\Column(type: 'integer')]
    private $start_date;

    #[ORM\Column(type: 'string', length: 8)]
    private $http_method;

    #[ORM\Column(type: 'string', length: 128)]
    private $path;

    #[ORM\Column(type: 'integer')]
    private $status_code;

    #[ORM\Column(type: 'string', length: 16)]
    private $http_protocol;

    #[ORM\Column(type: 'integer')]
    private $line_number;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getServiceName(): ?string
    {
        return $this->service_name;
    }

    public function setServiceName(string $service_name): self
    {
        $this->service_name = $service_name;

        return $this;
    }

    public function getStartDate(): ?int
    {
        return $this->start_date;
    }

    public function setStartDate(int $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getHttpMethod(): ?string
    {
        return $this->http_method;
    }

    public function setHttpMethod(string $http_method): self
    {
        $this->http_method = $http_method;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getStatusCode(): ?int
    {
        return $this->status_code;
    }

    public function setStatusCode(int $status_code): self
    {
        $this->status_code = $status_code;

        return $this;
    }

    public function getHttpProtocol(): ?string
    {
        return $this->http_protocol;
    }

    public function setHttpProtocol(string $http_protocol): self
    {
        $this->http_protocol = $http_protocol;

        return $this;
    }

    public function getLineNumber(): ?int
    {
        return $this->line_number;
    }

    public function setLineNumber(int $line_number): self
    {
        $this->line_number = $line_number;

        return $this;
    }
}
