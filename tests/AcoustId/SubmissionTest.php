<?php

namespace Tests\AcoustId;

use AcoustId\Exceptions\BadMethodCallException;
use AcoustId\Exceptions\InvalidArgumentException;
use AcoustId\Submission;
use Tests\TestCase;

/**
 * Class SubmissionTest
 *
 * @package Tests\AcoustId
 */
class SubmissionTest extends TestCase
{

    /**
     * @var Submission
     */
    protected $submission;

    /**
     * SubmissionTest constructor.
     *
     * @param string|null $name
     * @param array       $data
     * @param string      $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    /**
     * @throws InvalidArgumentException
     * @throws \AcoustId\Exceptions\UnexpectedValueException
     */
    protected function setUp(): void
    {
        $this->submission = new Submission(getenv('API_APPLICATION_TOKEN'));
        $this->submission->setUserToken(getenv('API_USER_TOKEN'));
    }

    /**
     * @throws BadMethodCallException
     * @covers \AcoustId\Submission::setJSONPResponseType
     */
    public function testSetJSONPResponseType()
    {
        $this->expectException(BadMethodCallException::class);
        $this->submission->setJSONPResponseType('test');
    }

    /**
     * @throws InvalidArgumentException
     * @covers \AcoustId\Submission::setWait
     */
    public function testSetWait(): void
    {
        $this->submission->setWait(10);
        $this->assertEquals(10, $this->submission->getWait());

        $this->expectException(InvalidArgumentException::class);
        $this->submission->setWait(-1);
    }

    /**
     * @throws InvalidArgumentException
     * @covers \AcoustId\Submission::setDuration
     */
    public function testSetDuration(): void
    {
        $this->submission->setDuration(120);
        $this->assertEquals(120, $this->submission->getDuration());

        $this->expectException(InvalidArgumentException::class);
        $this->submission->setDuration(-1);
    }

    /**
     * @throws InvalidArgumentException
     * @covers \AcoustId\Submission::getFingerPrint
     * @covers \AcoustId\Submission::setFingerPrint
     */
    public function testSetFingerPrint(): void
    {
        $this->submission->setFingerPrint('test');
        $this->assertEquals('test', $this->submission->getFingerPrint());
    }

    /**
     * @covers \AcoustId\Submission::getBitRate
     * @covers \AcoustId\Submission::setBitRate
     * @throws InvalidArgumentException
     */
    public function testSetBitRate(): void
    {
        $this->submission->setBitRate(320);
        $this->assertEquals(320, $this->submission->getBitRate());

        $this->expectException(InvalidArgumentException::class);
        $this->submission->setBitRate(-1);
    }

    /**
     * @covers \AcoustId\Submission::setFileFormat
     * @covers \AcoustId\Submission::getFileFormat
     */
    public function testSetFileFormat(): void
    {
        $this->submission->setFileFormat('mp3');
        $this->assertEquals('mp3', $this->submission->getFileFormat());
    }

    /**
     * @covers \AcoustId\Submission::setMbTrackId
     * @covers \AcoustId\Submission::getMbTrackId
     */
    public function testSetMbTrackId(): void
    {
        $this->submission->setMbTrackId('xxx');
        $this->assertEquals('xxx', $this->submission->getMbTrackId());
    }

    /**
     * @covers \AcoustId\Submission::setTrackTitle
     * @covers \AcoustId\Submission::getTrackTitle
     */
    public function testSetTrackTitle(): void
    {
        $this->submission->setTrackTitle('title');
        $this->assertEquals('title', $this->submission->getTrackTitle());
    }

    /**
     * @covers \AcoustId\Submission::getTrackArtist
     * @covers \AcoustId\Submission::setTrackArtist
     */
    public function testSetTrackArtist(): void
    {
        $this->submission->setTrackArtist('artist');
        $this->assertEquals('artist', $this->submission->getTrackArtist());
    }

    /**
     * @covers \AcoustId\Submission::setAlbumTitle
     * @covers \AcoustId\Submission::getAlbumTitle
     */
    public function testSetAlbumTitle(): void
    {
        $this->submission->setAlbumTitle('a-title');
        $this->assertEquals('a-title', $this->submission->getAlbumTitle());
    }

    /**
     * @covers \AcoustId\Submission::setAlbumArtist
     * @covers \AcoustId\Submission::getAlbumArtist
     */
    public function testSetAlbumArtist(): void
    {
        $this->submission->setAlbumArtist('a-artist');
        $this->assertEquals('a-artist', $this->submission->getAlbumArtist());
    }

    /**
     * @covers \AcoustId\Submission::setAlbumReleaseYear
     * @covers \AcoustId\Submission::getAlbumReleaseYear
     * @throws InvalidArgumentException
     */
    public function testSetAlbumReleaseYear(): void
    {
        $this->submission->setAlbumReleaseYear(date('Y'));
        $this->assertEquals(date('Y'), $this->submission->getAlbumReleaseYear());

        $this->expectException(InvalidArgumentException::class);
        $this->submission->setDiscNo(-1);
    }

    /**
     * @covers \AcoustId\Submission::getTrackNo
     * @covers \AcoustId\Submission::setTrackNo
     * @throws InvalidArgumentException
     */
    public function testSetTrackNo(): void
    {
        $this->submission->setTrackNo(1);
        $this->assertEquals(1, $this->submission->getTrackNo());

        $this->expectException(InvalidArgumentException::class);
        $this->submission->setTrackNo(-1);
    }

    /**
     * @covers \AcoustId\Submission::getDiscNo
     * @covers \AcoustId\Submission::setDiscNo
     * @throws InvalidArgumentException
     */
    public function testSetDiscNo(): void
    {
        $this->submission->setDiscNo(10);
        $this->assertEquals(10, $this->submission->getDiscNo());

        $this->expectException(InvalidArgumentException::class);
        $this->submission->setDiscNo(-1);
    }

    /**
     * @covers \AcoustId\Submission::getUserToken
     * @covers \AcoustId\Submission::setUserToken
     * @throws InvalidArgumentException
     */
    public function testSetUserToken(): void
    {
        $this->submission->setUserToken(getenv('API_USER_TOKEN'));
        $this->assertEquals(getenv('API_USER_TOKEN'), $this->submission->getUserToken());
    }

    /**
     * @throws InvalidArgumentException
     * @throws \AcoustId\Exceptions\HttpException
     * @throws \AcoustId\Exceptions\UnexpectedValueException
     * @covers \AcoustId\Submission::send
     */
    public function testSend(): void
    {
        $this->submission->setFingerPrint('AQABz0qUkZK4oOfhL-CPc4e5C_wW2H2QH9uDL4cvoT8UNQ-eHtsE8cceeFJx-LiiHT-aPzhxoc-Opj_eI5d2hOFyMJRzfDk-QSsu7fBxqZDMHcfxPfDIoPWxv9C1o3yg44d_3Df2GJaUQeeR-cb2HfaPNsdxHj2PJnpwPMN3aPcEMzd-_MeB_Ej4D_CLP8ghHjkJv_jh_UDuQ8xnILwunPg6hF2R8HgzvLhxHVYP_ziJX0eKPnIE1UePMByDJyg7wz_6yELsB8n4oDmDa0Gv40hf6D3CE3_wH6HFaxCPUD9-hNeF5MfWEP3SCGym4-SxnXiGs0mRjEXD6fgl4LmKWrSChzzC33ge9PB3otyJMk-IVC6R8MTNwD9qKQ_CC8kPv4THzEGZS8GPI3x0iGVUxC1hRSizC5VzoamYDi-uR7iKPhGSI82PkiWeB_eHijvsaIWfBCWH5AjjCfVxZ1TQ3CvCTclGnEMfHbnZFA8pjD6KXwd__Cn-Y8e_I9cq6CR-4S9KLXqQcsxxoWh3eMxiHI6TIzyPv0M43YHz4yte-Cv-4D16Hv9F9C9SPUdyGtZRHV-OHEeeGD--BKcjVLOK_NCDXMfx44dzHEiOZ0Z44Rf6DH5R3uiPj4d_PKolJNyRJzyu4_CTD2WOvzjKH9GPb4cUP1Av9EuQd8fGCFee4JlRHi18xQh96NLxkCgfWFKOH6WGeoe4I3za4c5hTscTPEZTES1x8kE-9MQPjT8a8gh5fPgQZtqCFj9MDvp6fDx6NCd07bjx7MLR9AhtnFnQ70GjOcV0opmm4zpY3SOa7HiwdTtyHa6NC4e-HN-OfC5-OP_gLe2QDxfUCz_0w9l65HiPAz9-IaGOUA7-4MZ5CWFOlIfe4yUa6AiZGxf6w0fFxsjTOdC6Itbh4mGD63iPH9-RFy909XAMj7mC5_BvlDyO6kGTZKJxHUd4NDwuZUffw_5RMsde5CWkJAgXnDReNEaP6DTOQ65yaD88HoeX8fge-DSeHo9Qa8cTHc80I-_RoHxx_UHeBxrJw62Q34Kd7MEfpCcu6BLeB1ePw6OO4sOF_sHhmB504WWDZiEu8sKPpkcfCT9xfej0o0lr4T5yNJeOvjmu40w-TDmqHXmYgfFhFy_M7tD1o0cO_B2ms2j-ACEEQgQgAIwzTgAGmBIKIImNQAABwgQATAlhDGCCEIGIIM4BaBgwQBogEBIOESEIA8ARI5xAhxEFmAGAMCKAURKQQpQzRAAkCCBQEAKkQYIYIQQxCixCDADCABMAE0gpJIgyxhEDiCKCCIGAEIgJIQByAhFgGACCACMRQEyBAoxQiHiCBCFOECQFAIgAABR2QAgFjCDMA0AUMIoAIMChQghChASGEGeYEAIAIhgBSErnJPPEGWYAMgw05AhiiGHiBBBGGSCQcQgwRYJwhDDhgCSCSSEIQYwILoyAjAIigBFEUQK8gAYAQ5BCAAjkjCCAEEMZAUQAZQCjCCkpCgFMCCiIcVIAZZgilAQAiSHQECOcQAQIc4QClAHAjDDGkAGAMUoBgyhihgEChFCAAWEIEYwIJYwViAAlHCBIGEIEAEIQAoBwwgwiEBAEEEOoEwBY4wRwxAhBgAcKAESIQAwwIowRFhoBhAE');
        $this->submission->setDuration(641);
        $result = $this->submission->send();
        $this->isSuccessfulResult($result);
    }
}
