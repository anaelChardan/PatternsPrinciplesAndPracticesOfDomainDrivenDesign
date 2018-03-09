<?php
declare(strict_types=1);

namespace Anael\DomainModel\Model;

use Ramsey\Uuid\Uuid;

class Auction
{
    /** @var Uuid */
    private $id;
    /** @var Uuid */
    private $listingId;
    /** @var Money */
    private $startingPrice;
    /** @var \DateTime */
    private $endsAt;
    /** @var WinningBid */
    private $winningBid;
    /** @var bool */
    private $hasEnded;

    public function __construct(Uuid $id, Uuid $listingId, Money $startingPrice, \DateTime $endsAt)
    {
        if ($id === null) {
            throw new \InvalidArgumentException("Auction Id cannot be null");
        }

        if ($listingId === null) {
            throw new \InvalidArgumentException("Listing Id cannot be null");
        }

        if ($startingPrice === null) {
            throw new \InvalidArgumentException("StartingPrice cannot be null");
        }

        if ($endsAt === null) {
            throw new \InvalidArgumentException("EndsDate cannot be null");
        }

        $this->id = $id;
        $this->listingId = $listingId;
        $this->startingPrice = $startingPrice;
        $this->endsAt = $endsAt;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function setId(Uuid $id): void
    {
        $this->id = $id;
    }

    public function getListingId(): Uuid
    {
        return $this->listingId;
    }

    public function setListingId(Uuid $listingId): void
    {
        $this->listingId = $listingId;
    }

    public function getStartingPrice(): Money
    {
        return $this->startingPrice;
    }


    public function setStartingPrice(Money $startingPrice)
    {
        $this->startingPrice = $startingPrice;
    }

    public function getEndsAt(): \DateTime
    {
        return $this->endsAt;
    }

    public function setEndsAt(\DateTime $endsAt)
    {
        $this->endsAt = $endsAt;
    }

    public function getWinningBid(): WinningBid
    {
        return $this->winningBid;
    }

    public function setWinningBid(WinningBid $winningBid): void
    {
        $this->winningBid = $winningBid;
    }

    public function hasEnded(): bool
    {
        return $this->hasEnded;
    }

    public function setHasEnded(bool $hasEnded): void
    {
        $this->hasEnded = $hasEnded;
    }

    public function canPlaceBid(): bool
    {
        return $this->hasEnded === false;
    }

    public function placeBidFor(Bid $bid, \DateTime $currentTime): void
    {
        if ($this->stillInProgress($currentTime)) {
            if ($this->isFirstBid()) {
                $this->registerFirst($bid);
                return;
            }

            if ($this->bidderIsIncreasingMaximumBid($bid)) {
                $this->winningBid = $
            }
        }
    }

    private function stillInProgress(\DateTime $currentTime): bool
    {
        return $this->endsAt > $currentTime;
    }

    private function isFirstBid(): bool
    {
    }

    private function registerFirst($bid): void
    {
    }
}