<?php

/*
 * The MIT License
 *
 * Copyright 2016 LengthOfRope, Bas de Kort <bdekort@gmail.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/

namespace LengthOfRope\JSONLD\Schema;

/**
 * Server that provides game interaction in a multiplayer game.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class GameServerSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new GameServerSchema('http://schema.org/', 'GameServer');
    }

    /**
     * Video game which is played on this server.
     *
     * @param $game VideoGameSchema
     **/
    public function setGame($game) {
        $this->properties['game'] = $game;

        return $this;
    }

    /**
     * @return VideoGameSchema
     **/
    public function getGame() {
        return $this->properties['game'];
    }

    /**
     * Number of players on the server.
     *
     * @param $playersOnline IntegerSchema
     **/
    public function setPlayersOnline($playersOnline) {
        $this->properties['playersOnline'] = $playersOnline;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getPlayersOnline() {
        return $this->properties['playersOnline'];
    }

    /**
     * Status of a game server.
     *
     * @param $serverStatus GameServerStatusSchema
     **/
    public function setServerStatus($serverStatus) {
        $this->properties['serverStatus'] = $serverStatus;

        return $this;
    }

    /**
     * @return GameServerStatusSchema
     **/
    public function getServerStatus() {
        return $this->properties['serverStatus'];
    }


}
