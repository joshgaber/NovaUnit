<?php

namespace JoshGaber\NovaUnit\Tests\Feature\Actions;

use JoshGaber\NovaUnit\Actions\MockActionResponse;
use JoshGaber\NovaUnit\Tests\TestCase;
use Laravel\Nova\Actions\Action;

class MockActionResponseTest extends TestCase
{
    public function testItSucceedsOnMessageResponse()
    {
        $mockActionResponse = new MockActionResponse(Action::message('test'));
        $mockActionResponse->assertMessage();
    }

    public function testItFailsOnResponseOtherThanMessage()
    {
        $this->shouldFail();
        $mockActionResponse = new MockActionResponse(Action::danger('test'));
        $mockActionResponse->assertMessage();
    }

    public function testItSucceedsOnDangerResponse()
    {
        $mockActionResponse = new MockActionResponse(Action::danger('test'));
        $mockActionResponse->assertDanger();
    }

    public function testItFailsOnResponseOtherThanDanger()
    {
        $this->shouldFail();
        $mockActionResponse = new MockActionResponse(Action::message('test'));
        $mockActionResponse->assertDanger();
    }

    public function testItSucceedsOnDeletedResponse()
    {
        $mockActionResponse = new MockActionResponse(Action::deleted());
        $mockActionResponse->assertDeleted();
    }

    public function testItFailsOnResponseOtherThanDeleted()
    {
        $this->shouldFail();
        $mockActionResponse = new MockActionResponse(Action::message('test'));
        $mockActionResponse->assertDeleted();
    }

    public function testItSucceedsOnRedirectResponse()
    {
        $mockActionResponse = new MockActionResponse(Action::redirect('test'));
        $mockActionResponse->assertRedirect();
    }

    public function testItFailsOnResponseOtherThanRedirect()
    {
        $this->shouldFail();
        $mockActionResponse = new MockActionResponse(Action::message('test'));
        $mockActionResponse->assertRedirect();
    }

    public function testItSucceedsOnPushResponse()
    {
        $mockActionResponse = new MockActionResponse(Action::push('test', ''));
        $mockActionResponse->assertPush();
    }

    public function testItSucceedsOnVisitResponse()
    {
        $mockActionResponse = new MockActionResponse(Action::visit('test'));
        $mockActionResponse->assertVisit();
    }

    public function testItFailsOnResponseOtherThanVisit()
    {
        $this->shouldFail();
        $mockActionResponse = new MockActionResponse(Action::message('test'));
        $mockActionResponse->assertVisit();
    }

    public function testItFailsOnResponseOtherThanPush()
    {
        $this->shouldFail();
        $mockActionResponse = new MockActionResponse(Action::message('test'));
        $mockActionResponse->assertPush();
    }

    public function testItSucceedsOnDownloadResponse()
    {
        $mockActionResponse = new MockActionResponse(Action::download('test', 'test'));
        $mockActionResponse->assertDownload();
    }

    public function testItFailsOnResponseOtherThanDownload()
    {
        $this->shouldFail();
        $mockActionResponse = new MockActionResponse(Action::message('test'));
        $mockActionResponse->assertDownload();
    }

    public function testItSucceedsOnOpenInNewTabResponse()
    {
        $mockActionResponse = new MockActionResponse(Action::openInNewTab('test'));
        $mockActionResponse->assertOpenInNewTab();
    }

    public function testItFailsOnResponseOtherThanOpenInNewTab()
    {
        $this->shouldFail();
        $mockActionResponse = new MockActionResponse(Action::message('test'));
        $mockActionResponse->assertOpenInNewTab();
    }

    public function testItSucceedsWhenFindingSubstringInSuccessMessage()
    {
        $mockActionResponse = new MockActionResponse(Action::message('Test Message'));
        $mockActionResponse->assertMessageContains('test');
    }

    public function testItFailsWhenNotFindingSubstringInSuccessMessage()
    {
        $this->shouldFail();
        $mockActionResponse = new MockActionResponse(Action::message('Test Message'));
        $mockActionResponse->assertMessageContains('echo');
    }

    public function testItFailsWhenThereIsNoSuccessMessage()
    {
        $this->shouldFail();
        $mockActionResponse = new MockActionResponse(Action::danger('Test Message'));
        $mockActionResponse->assertMessageContains('test');
    }

    public function testItSucceedsWhenFindingSubstringInDangerMessage()
    {
        $mockActionResponse = new MockActionResponse(Action::danger('Test Message'));
        $mockActionResponse->assertDangerContains('test');
    }

    public function testItFailsWhenNotFindingSubstringInDangerMessage()
    {
        $this->shouldFail();
        $mockActionResponse = new MockActionResponse(Action::danger('Test Message'));
        $mockActionResponse->assertDangerContains('echo');
    }

    public function testItFailsWhenThereIsNoDangerMessage()
    {
        $this->shouldFail();
        $mockActionResponse = new MockActionResponse(Action::message('Test Message'));
        $mockActionResponse->assertDangerContains('test');
    }

    public function testItFailsOnNoResponse()
    {
        $this->shouldFail();
        $mockActionResponse = new MockActionResponse();
        $mockActionResponse->assertResponseType('message');
    }
}
