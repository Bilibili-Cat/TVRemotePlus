---------------------------------------------------


	VCEEnc
	 by rigaya

---------------------------------------------------

VCEEnc は、
AMDのVCE(VideoCodecEngine)を使用してエンコードを行うAviutlの出力プラグインです。
VCEによるハードウェア高速エンコードを目指します。

【基本動作環境】
Windows 10 (x86/x64)
Aviutl 1.00 以降
VCEが載ったハードウェア
  AMD製 GPU Radeon HD 7xxx以降
  AMD製 APU Trinity世代(第2世代)以降
AMD Radeon Software Adrenalin Edition 21.6.1 以降


【VCEEnc 使用にあたっての注意事項】
無保証です。自己責任で使用してください。
VCEEncを使用したことによる、いかなる損害・トラブルについても責任を負いません。

【VCEEnc 再配布(二次配布)について】
このファイル(VCEEnc_readme.txt)と一緒に配布してください。念のため。
まあできればアーカイブまるごとで。
     
【VCEEnc 使用方法 (簡易インストーラ使用)】
付属の簡易インストーラを使用する方法です。
手動で行う場合は、後述のVCEEnc 使用方法 (手動)を御覧ください。

1. ダウンロードしたVCEEnc_5.xx.zipを一度解凍します。

2. auo_setup.exeをダブルクリックし、実行します。
   基本的に自動で必要なもののダウンロード・インストールが行われます。

3. 途中でAviutl.exeのあるフォルダ場所を聞かれますので、
   右側のボタンをクリックしてAviutlのフォルダを指定してください。
   
4. インストールが完了しました、と出るのをお待ちください。


【VCEEnc 使用方法 (手動)】
1. 
以下のものをインストールしてください。

Visual Studio 2019 の Visual C++ 再頒布可能パッケージ (x86) 
https://aka.ms/vs/16/release/vc_redist.x86.exe

.NET Framework 4.5がインストールされていない場合、インストールしてください。
通常はWindows Updateでインストールされ、またCatalyst Control Centerでも使用されているため、
インストールの必要はありません。

.NET Framework 4.5.2 (x86)
https://www.microsoft.com/ja-jp/download/details.aspx?id=30653

2. 
auoフォルダ内の
・VCEEnc.auo
・VCEEnc.ini
・VCEEnc_stgフォルダ
をAviutlのpluginフォルダにコピーします。

3. 
Aviutlを起動し、「その他」>「出力プラグイン情報」にVCEEncがあるか確かめます。
ここでVCEEncの表示がない場合、1.で必要なものを忘れている、あるいは失敗したなどが考えられます。

4. 必要な実行ファイルを集めます。
   以下に実行ファイル名とダウンロード場所を列挙します。
   実行ファイルは32bit/64bitともに可です。
<主要エンコーダ・muxer>
 [qaac/refalac (AAC/ALACエンコーダ)]
 http://sites.google.com/site/qaacpage/
 
 [L-SMASH (mp4出力時に必要)]
 http://pop.4-bit.jp/
 
 [mkvmerge (mkv出力時に必要)]
 http://www.bunkus.org/videotools/mkvtoolnix/
 
<音声エンコーダ>
 [ffmpeg     (AAC, AC3, mp3エンコーダとして使用)]
 https://ffmpeg.zeranoe.com/builds/
 http://blog.k-tai-douga.com/

 [neroaacenc (AACエンコーダ)]
 http://www.nero.com/jpn/downloads-nerodigital-nero-aac-codec.php

 [FAW(fawcl) (FakeAACWave(偽装wav)解除)]
 http://2sen.dip.jp/cgi-bin/friioup/upload.cgi?search=FakeAacWav&sstart=0001&send=9999
 
 [faw2aac.auo (FakeAACWave(偽装wav)解除)]
 http://www.rutice.net/FAW2aac

 [qtaacenc   (AACエンコーダ, 要QuickTime)]
 http://tmkk.pv.land.to/qtaacenc/
 
 [ext_bs     (PVシリーズAAC抽出)]
 http://www.sakurachan.org/soft/mediatools/
 
 [lame       (mp3エンコーダ)]
 http://www.rarewares.org/mp3-lame-bundle.php
 
 [oggenc2    (ogg Vorbis, mkv専用)]
 http://www.rarewares.org/ogg-oggenc.php 
 
 [mp4alsrm23 (MPEG4 ALS (MPEG4 Audio Lossless Coding))]
 http://www.nue.tu-berlin.de/menue/forschung/projekte/beendete_projekte/mpeg-4_audio_lossless_coding_als/parameter/en/
 ※Reference Software のとこにある MPEG-4 ALS codec for Windows - mp4alsRM23.exe
 
5.
VCEEncの設定画面を開き、各実行ファイルの場所を指定します。
あと適当に設定します。

6.
エンコード開始。気長に待ちます。


【iniファイルによる拡張】
VCEEnc.iniを書き換えることにより、
音声エンコーダやmuxerのコマンドラインを変更できます。
また音声エンコーダを追加することもできます。

デフォルトの設定では不十分だと思った場合は、
iniファイルの音声やmuxerのコマンドラインを調整してみてください。


【ビルドについて】
ビルドにはVC++2019が必要です。

コーディングが汚いとか言わないで。

【コンパイル環境】
VC++ 2019 Community


【検証環境 2012.11〜】
Win7 x64
Xeon W3680 + ASUS P6T Deluxe V2 (X58)
Radeon HD 7770
18GB RAM
CatalystControlCenter 12.8
CatalystControlCenter 12.10
CatalystControlCenter 12.11 beta

【検証環境 2013.10】
Win7 x64
Core i7 4770K + Asrock Z87 Extreme4
Radeon HD 7770
16GB RAM
CatalystControlCenter 13.4

【検証環境 2015.09】
Win7 x64
Core i7 4770K + Asrock Z97E-ITX/ac
Radeon R7 360
8GB RAM
CatalystControlCenter 15.7

【検証環境 2015.10】
なし

【検証環境 2016.06】
Win7 x64
Core i7 4770K + Asrock Z97E-ITX/ac
Radeon R7 360
8GB RAM
CatalystControlCenter 15.7

【検証環境 2016.06】
Win7 x64
Core i7 4770K + Asrock Z97E-ITX/ac
Radeon RX 460
8GB RAM
CatalystControlCenter 17.1

【検証環境 2018.11】
Win10 x64
Core i7 7700K + Asrock Z270 Gaming-ITX/ac
Radeon RX 460
16GB RAM

【検証環境 2019.11】
Win10 x64
Ryzen3 3200G + Asrock AB350 Pro4
16GB RAM

【検証環境 2020.06】
Win10 x64
Ryzen3 3200G + Asrock AB350 Pro4
Radeon RX 460
16GB RAM

【検証環境 2021.01】
Win10 x64
Ryzen9 5950X + Gigabyte B550 AOURUS Master
Radeon RX5500XT
Radeon RX460
32GB RAM

【お断り】
今後の更新で設定ファイルの互換性がなくなるかもしれません。

【どうでもいいメモ】
2021.07.29 (6.13)
・最近のAMDドライバが、GetFormatAt関数で適切な値を返さないため、
  ... does not support input/output format などのエラーが生じる問題を回避。
・AMFを1.4.21に更新。AMD Driver 21.6.1以降が必要。
・入力ファイルと出力ファイルが同じである場合にエラー終了するように。
・OpenCLでcropすると色成分がずれるのを修正。
・y4m読み込みの際、指定したインタレ設定が上書きされてしまうのを修正。
・OpenCLのyuv444→nv12の修正。
・--vpp-decimateの計算用領域が不足していた不具合を修正。
・yuv444→p010のavx2版の色ずれを修正。
・AvisynthNeo環境などで生じるエラー終了を修正。

2021.05.23 (6.12)
・raw出力、log出力の際にカレントディレクトリに出力しようとすると異常終了が発生する問題を修正。

2021.05.09 (6.11)
・avsw/avhwでのファイル読み込み時にファイル解析サイズの上限を設定するオプションを追加。(--input-probesize)
・--input-analyzeを小数点で指定可能なよう拡張。
・読み込んだパケットの情報を出力するオプションを追加。( --log-packets )
・data streamに限り、タイムスタンプの得られていないパケットをそのまま転送するようにする。
・オプションを記載したファイルを読み込む機能を追加。( --option-file )
・動画情報を取得できない場合のエラーメッセージを追加。
・コピーするtrackをコーデック名で選択可能に。
・字幕の変換が必要な場合の処理が有効化されていなかったのを修正。
・下記OpenCLによるvppフィルタを追加。
  - --vpp-delogo
  - --vpp-decimate
  - --vpp-mpdecimate

2021.04.17 (6.10)
・RX5500XTなどでパラメータの設定が反映されない場合があったのを修正。
・--sub-metadata, --audio-metadataを指定した場合にも入力ファイルからのmetadataをコピーするように。
・字幕のmetadataが二重に出力されてしまっていた問題を修正。
・--audio-source/--sub-sourceを複数指定した場合の挙動を改善。
・--avsync forcecfrの連続フレーム挿入の制限を1024まで緩和。
・正常に動作しない--videoformat autoの削除。

2021.02.18 (6.09)
・AMF SDK 1.4.18に対応。これに伴い、AMD driver 20.11.2以降が必要。
・VP9 HWデコードのサポートを追加。
・AvisynthのUnicode対応に伴い、プロセスの文字コードがUTF-8になっているのを
  OSのデフォルトの文字コード(基本的にShiftJIS)に戻すオプションを追加。(--process-codepage os)
・AvisynthのUnicode対応を追加。
・Windows 10のlong path supportの追加。
・色空間変換を行うフィルタを追加。(--vpp-colorspace)
・細線化フィルタを追加。(--vpp-warpsharp)
・--vpp-subburnで埋め込みフォントを使用可能なように。
・--vpp-subburnでフォントの存在するフォルダを指定可能なように。
・--audio-source / --sub-source でmetadataを指定可能なよう拡張。
・--ssim, --psnrの10bit深度対応を追加。
・timecodeの出力を追加。(--timecode)
・--check-featureで10bit深度エンコードのサポートの有無を表示するように。
・--check-featureでHWデコーダの情報を表示するように。
・マルチGPU環境でGPUの自動選択をする際に、10bit深度エンコードのサポートの有無をチェックするように。
・マルチGPU環境でGPUの自動選択をする際に、--avhw使用時にはHWデコーダの有無をチェックするように。

2021.01.27 (6.08)
・RX5xxx以降での10bit深度のエンコードに対応。(--output-depth 10)
・--vpp-smoothがRX5xxxで正常に動作しなかったのを修正。
・timecodeの出力を追加。(--timecode)
・言語による音声や字幕の選択に対応。
・ビット深度を下げるときの丸め方法を改善。
・パフォーマンスカウンター集計を改善。
・--vpp-tweakのsaturation,hueを指定した場合に異常終了してしまうのを修正。
・--ssim計算時にエラーで異常終了する場合があったのを修正。
・NVEncと同様に--qualityを--presetに変更。

2020.11.23 (6.07)
[VCEEncC]
・VUIを設定すると出力が異常になる場合があったのを修正。
・--chapterが効かなかったのを修正。

2020.11.03 (6.06)
[VCEEncC]
・ノイズを除去するフィルタの追加。(--vpp-smooth)
・字幕トラックを焼きこむフィルタを追加。( --vpp-subburn )
・YUV422読み込みのサポートを追加。
・HEVCのlowlatencyが正しく設定されないのを修正。
・H.264のlowlatencyモードが、指定していないのに動作してしまうのを修正。
・異常終了が発生した場合のフリーズを回避。

2020.09.23 (6.05)
[VCEEncC]
・ログメッセージでlowlatencyが無効の場合もいつもlowlatencyと表示されていたのを修正。
・hrdをデフォルトではオフに。--enforce-hrdで有効化できる。

2020.09.17 (6.04)
[VCEEncC]
・2つめのインタレ解除フィルタ (--vpp-nnedi)を追加。
・映像にパディングを付加するフィルタ(--vpp-pad)を追加。
・映像の回転・反転を行うフィルタを追加。(--vpp-rotate/vpp-transform)
・preanalysisの情報が不必要に表示されていたのを修正。
・proresがデコードできないのを修正。
・raw読み込み時に色空間を指定するオプションを追加。(--input-csp)
・HEVC 10bitのhwデコードのサポートを追加。
・HEVCエンコード時のプリセットが正しく設定されないのを修正。

2020.07.06 (6.03)
[VCEEncC]
・ノイズ除去フィルタ(--vpp-knn)を追加。
・ノイズ除去フィルタ(--vpp-pmd)を追加。
・エッジ調整フィルタ(--vpp-edgelevel)を追加。
・エッジ強調フィルタ(--vpp-unsharp)を追加。
・バンディング低減フィルタ(--vpp-deband)を追加。
・色調整フィルタ(--vpp-tweak)を追加。
・複数のAMD GPU環境でも選択したGPUを適切に使用できるように改良。
・出力ファイルのmetadata制御を行うオプション群を追加。
  --metadata
  --video-metadata
  --audio-metadata
  --sub-metadata
・attachmentをコピーするオプションを追加。 ( --attachment-copy )
・streamのdispositionを指定するオプションを追加。 ( --audio-disposition, --sub-disposition )
・--audio-sourceでもdelayを指定できるように。
・6.01からvpy読み込みがシングルスレッド動作になっていたのをマルチスレッド動作に戻した。
・オプションリストを表示するオプションを追加。 ( --option-list )
・avs読み込みで、可能であれば詳細なバージョン情報を取得するように。
・一部のHEVCファイルで、正常にデコードできないことがあるのに対し、可能であればswデコーダでデコードできるようにした。
・遅延を伴う一部の--audio-filterで音声の最後がエンコードされなくなってしまう問題を修正。
・--audio-source/--sub-sourceでうまくファイル名を取得できないことがあるのを修正。
・avsw/avhw読み込み時にlowlatencyが使用できないのを修正。
・--video-tagを指定すると異常終了してしまうのを修正。
・raw出力でSAR比を指定したときに発生するメモリリークを修正。

[VCEEnc.auo]
・VCEEnc.auoの設定画面でも、--output-resに負の値を指定できるように。
・簡易インストーラ更新。
  VC runtimeのダウンロード先のリンク切れを修正。

2020.05.14 (6.02)
[VCEEncC]
・vpp-afsのNaviでのOpenCLのコンパイルエラーを修正、6.01での修正が不十分だった。

[VCEEnc.auo]
・HEVC時の設定画面の挙動を改善。

2020.05.12 (6.01)
[VCEEncC]
・pre-encodeによるレート制御を使用するオプションを追加。( --pe )
・vpp-afsのNaviでのOpenCLのコンパイルエラーを修正する。
・遅延を最小化するモードを追加。 ( --lowlatency )

[VCEEnc.auo]
・VCEEnc.auoからsarが指定できないのを修正。
・外部エンコーダ使用時に、音声エンコードを「同時」に行うと異常終了するのを修正。

2020.04.19 (6.00)
[VCEEncC]
・音声デコーダやエンコーダへのオプション指定が誤っていた場合に、
  エラーで異常終了するのではなく、警告を出して継続するよう変更。
・--chapterがavsw/avhw利用時にしか効かなかったのを修正。

[VCEEnc.auo]
・VCEEnc.auoで内部エンコーダを使用するモードを追加。
  こちらの動作をデフォルトにし、外部エンコーダを使うほうはオプションに。

2020.03.07 (5.04)
[VCEEncC]
・avsw/avhw読み込み時の入力オプションを指定するオプションを追加。(--input-option)
・trueHDなどの一部音声がうまくmuxできないのを改善。
・VCEEnc.auoの修正に対応する変更を実施。

[VCEEnc.auo]
・VCEEnc.auoから出力するときに、Aviutlのウィンドウを最小化したり元に戻すなどするとフレームが化ける問題を修正。

2020.02.29 (5.03)
[VCEEncC]
・caption2assが正常に動作しないケースがあったのを修正。
・5.02で--cqpが正常に動作しない問題を修正。

[VCEEnc.auo]
・簡易インストーラの安定動作を目指した改修。
  必要な実行ファイルをダウンロードしてインストールする形式から、
  あらかじめ同梱した実行ファイルを展開してインストールする方式に変更する。
・デフォルトの音声エンコーダをffmpegによるAACに変更。
・VCEEnc.auoの設定画面のタブによる遷移順を調整。

2020.02.11 (5.02)
[VCEEncC]
・動作環境の変更。Win10のみ対応。
・AMF 1.4.14 -> 1.4.16に更新。
  AMD Radeon Software Adrenalin Edition 20.2.1 以降が必要に。
・AMF 1.4.16で追加されたpre-anaysisに関するオプションを追加。(VCEEncCのみ)
  (--pa, --pa-sc, --pa-ss, --pa-activity-type, --pa-caq-strength, --pa-initqpsc, --pa-fskip-maxqp )
・ssim/psnrを計算するオプションを追加。(--ssim/--psnr)
・HDR関連のmeta情報を入力ファイルからコピーできるように。
  (--master-display copy, --max-cll copy)
・colormatrix等の情報を入力ファイルからコピーする機能を追加。
  --colormtarix copy
  --colorprim copy
  --transfer copy
  --chromaloc copy
  --colorrange copy
・HEVCエンコ時に、high tierの存在しないlevelが設定された場合、main tierに修正するように。
・mux時の動作の安定性を向上し、シーク時に不安定になる症状を改善。
・Windowsのパフォーマンスカウンタを使用したプロセスのGPU使用率情報を使用するように。
・Readme等で、NVEncのままの表記だった個所を修正。
・ログに常に出力ファイル名を表示するように。
・VUI情報、mastering dsiplay, maxcllの情報をログに表示するように。

2019.12.24 (5.01)
[VCEEncC]
・OpenCLで実装された自動フィールドシフトを追加。(--vpp-afs)
・音声処理でのメモリリークを解消。
・音声エンコード時のエラーメッセージ強化。
・字幕のコピー等が動かなくなっていたのを修正。
・trueHD in mkvなどで、音声デコードに失敗する場合があるのを修正。
・音声に遅延を加えるオプションを追加。 ( --audio-delay )
・mkv入りのVC-1をカットした動画のエンコードに失敗する問題を修正。
・HWデコード時に映像が乱れる場合があったのを回避。

[VCEEnc.auo]
・簡易インストーラを更新。
・AVX2版のyuy2→nv12i変換の誤りを修正。

2019.11.19 (5.00)
[共通]
・AMF 1.4.8 -> 1.4.14に更新。
・VC++2019に移行。

[VCEEnc.auo]
・VCEEnc.auo - VCEEncC間のフレーム転送を効率化して高速化。
・簡易インストーラを更新。
・VCEEnc.auoの出力をmp4/mkv出力に変更し、特に自動フィールドシフト使用時のmux工程数を削減する。
  また、VCEEncCのmuxerを使用することで、コンテナを作成したライブラリとしQSVEncCを記載するようにする。

[VCEEncC]
・可能なら進捗表示に沿うフレーム数と予想ファイルサイズを表示。
・映像のcodec tagを指定するオプションを追加。(--video-tag)
・字幕ファイルを読み込むオプションを追加。 (--sub-source )
・--audio-sourceを改修し、より柔軟に音声ファイルを取り扱えるように。
・データストリームをコピーするオプションを追加する。(--data-copy)
・--sub-copyで字幕をデータとしてコピーするモードを追加。
  --sub-copy asdata
・--audio-codecにデコーダオプションを指定できるように。
  --audio-codec aac#dual_mono_mode=main
・avsからの音声処理に対応。
・高負荷時にデッドロックが発生しうる問題を修正。
・音声エンコードの安定性を向上。
・CPUの動作周波数が適切に取得できないことがあったのを修正。
・--chapterでmatroska形式に対応する。
・--audio-copyでTrueHDなどが正しくコピーされないのを修正。
・--trimを使用すると音声とずれてしまう場合があったのを修正。
・音声エンコード時のtimestampを取り扱いを改良、VFR時の音ズレを抑制。
・mux時にmaster-displayやmax-cllの情報が化けるのを回避。
・ffmpegと関連dllを追加/更新。
  - [追加] libxml2 2.9.9
  - [追加] libbluray 1.1.2
  - [追加] aribb24 rev85
  - [更新] libpng 1.6.34 -> 1.6.37
  - [更新] libvorbis 1.3.5 -> 1.3.6
  - [更新] opus 1.2.1 -> 1.3.1
  - [更新] soxr 0.1.2 -> 0.1.3
・そのほかさまざまなNVEnc/QSVEnc側の更新を反映。

2018.12.11 (4.02)  
[VCEEnc.auo]
・自動フィールドシフト使用時、widthが32で割り切れない場合に範囲外アクセスの例外で落ちる可能性があったのを修正。
・Aviutlからのフレーム取得時間(平均)の表示をログに追加。

2018.11.24 (4.01)
[VCEEncC]
・読み込みにudp等のプロトコルを使用する場合に、正常に処理できなくなっていたのを修正。
・--audio-fileが正常に動作しないことがあったのを修正。

2018.11.18 (4.00)
[共通]
・AMF 1.4.9に対応。
・colormatrix/colorprim/transfer/videoformatの指定に対応。
・HEVCのSAR比指定に対応。

[VCEEnc.auo]
・エンコーダをプラグインに内蔵せず、VCEEncCにパイプ渡しするように。
  Aviutl本体プロセスのメモリ使用量を削減する。
・設定ファイルのフォーマットを変更したため、以前までの設定ファイルは読めなくなってしまったのでご注意ください。
・簡易インストーラを更新。
  - Apple dllがダウンロードできなくなっていたので対応。
  - システムのプロキシ設定を自動的に使用するように。

2017.02.27 (3.06)
[VCEEncC]
・HEVCデコードができなくなっていたのを修正。
・ログ出力を強化。

2017.02.16 (3.05v2)
[VCEEncC]
※同梱のdll類も更新してください!
・dllの更新忘れにより、HEVCデコードができなくなっていたのを修正。

2017.02.14 (3.05)
[VCEEncC]
・enforce-hdrをデフォルトでオフに。
・enforce-hdrの有効無効の切り替えオプションを追加。(--enforce-hdr)
・fillerデータの有効無効の切り替えオプションを追加。(--filler)

2017.02.03 (3.04)
[共通]
・3.00から高くなっていたCPU使用率を低減。
・リモートデスクトップ中のエンコードをサポート。
  DX9での初期化に失敗した場合、DX11での初期化を行う。
・特に指定がない場合、levelや最大ビットレートを解像度やフレームレート、refなどから自動的に決定するように。
  Levelの不足により、HEVC 4Kエンコードができないのを修正する。

[VCEEnc.auo]
・cbr/vbrモードで、最大ビットレートの指定ができない問題を修正。
  
[VCEEncC]
・高ビット深度の入力ファイルに対しては、自動的にswデコードに回すように。
・使用するデバイスIDを指定できるように。
・VCEが使用可能か、HEVCエンコードが可能かを、デバイスIDを指定して行えるように。
・エラーでないメッセージが赤で表示されていたのを修正。
・特に指定がなく、解像度の変更もなければ、読み込んだSAR比をそのまま反映するように。

2017.02.01 (3.03)
[共通]
・HEVCでのvbr/cbrモードでのVBAQを許可。

[VCEEnc.auo]
・HEVCエンコ時にLevelが正しく保存されないのを修正。
・VCEEnc.auoからもHWリサイザを利用できるように。
・VCEEncCのHEVCエンコで--vbrが正常に動作しない問題を修正。

[VCEEncC]
・avswリーダーでYUV420 10bitの読み込みに対応(エンコードは8bit)。
・avswリーダー使用時に解像度によっては、色がずれてしまうのを修正。

2017.01.30 (3.02)
※同梱のdll類も更新してください!

[共通]
・H.264のfullrangeを指定するオプションを追加。(--fullrange)
・HEVCエンコで--qualityを指定すると常にログでnormalと表示される問題を修正。
・4Kがエンコードできない問題を修正。
・ログに出るdeblockの有効無効が反転していたのを修正。

[VCEEncC]
・HW HEVCデコードの安定性を向上。
・avcodecによるswデコードをサポート。(--avsw)
・HEVCのtierを指定するオプションを追加。(--tier <string>)
・--pre-analysisのquarterが正常に動作しなかったのを修正。
・HEVCの機能情報が取得できない問題を回避。
・音声処理のエラー耐性の向上。

2017.01.25 (3.01)
[共通]
・実行時にVCEの機能を確認し、パラメータのチェックを行うように。
・参照距離を指定するオプションを追加。(--ref <int>)
・LTRフレーム数を指定するオプションを追加。(--ltr <int>)
・H.264 Level 5.2を追加。
・バージョン情報にAMFのバージョンを追記。

[VCEEncC]
・ヘルプの誤字脱字等を修正。
・VCEの機能をチェックするオプションを追加。(--check-features)
  HEVCの機能については正常に表示できない。
・HEVC(8bit)のHWデコードを追加。
・wmv3のHWデコードが正常に動作しないため、削除。

2017.01.22 (3.00)
[共通]
・AMD Media Framework 1.4に対応。
  AMD Radeon Software Crimson 17.1.1 以降が必要。
・PolarisのHEVCエンコードを追加。(-c hevc)
・SAR比の指定を追加。
・先行探索を行うオプションを追加。(--pre-analysis)
・VBAQオプションを追加。(H.264のみ)
・その他、複数の不具合を修正。

2016.06.21 (2.00)
[VCEEncC]
・H.264/MPEG2のハードウェアデコードに対応。(avvceリーダー)
・muxしながら出力する機能を追加。
・音声の抽出/エンコードに対応。
・ハードウェアリサイズに対応。
・そのほかいろいろ。

注意点
・QSVEncC/NVEncCにあるような以下の機能には対応していません。
  - avsync
  - trim
  - crop
  - インタレ保持エンコード
  - インタレ解除
  - colormatrix, colorprim, transfer, videoformatなど

2016.01.14 (1.03v2)
・簡易インストーラでQuickTimeがダウンロードできなくなっていたのを修正。

2015.10.24 (1.03)
[VCEEnc]
・エンコ後バッチ処理の設定画面を修正。

2015.09.26 (1.02)
[VCEEnc]
・FAWCheckが働かないのを修正。

2015.09.24 (1.01)
[VCEEnc]
・音声エンコード時に0xc0000005例外で落ちることがあるのを修正。

[VCEEncC]
・更新なし。

2015.09.23 (1.00)
[共通]
・AMD APP SDK 3.0 + 新APIに移行し、Catalyst15.7以降で動作しなくなっていたのを修正。
・VC++ 2015に移行。
・.NET Framework 4.5.2に移行。

[VCEEnc]
・設定ファイルの互換性がなくなってしまいました。
・様々な機能をx264guiEx 2.34相当にアップデート。

[VCEEncC]
・新たに追加。(x86/x64)
・読み込みはraw/y4m/avs/vpy。

2013.12.07 (0.02v2)
・簡易インストーラを更新
  - 簡易インストーラをインストール先のAviutlフォルダに展開すると
    一部ファイルのコピーに失敗する問題を修正
  - L-SMASHがダウンロードできなくなっていたのを修正。
  - インストール先が管理者権限を必要とする際は、
    これを取得するダイアログを表示するようにした。
    
2013.10.20 (0.02)
・自動フィールドシフト対応。
・簡易インストーラを更新
  - Windows 8.1に対応した(と思う)
  - アップデートの際にプリセットを上書き更新するかを選択できるようにした。
・x264guiEx 2.03までの更新を反映。
  - ログウィンドウの位置を保存するようにした。
  - 高Dpi設定時の表示の崩れを修正。
  - エンコード開始時にクラッシュする可能性があるのを修正。
  - エンコ前後バッチ処理を最小化で実行する設定を追加。
  - 出力ファイルの種類のデフォルトを変更できるようにした。
  - FAW half size mix モード対応。
  - mux時にディスクの空き容量の取得に失敗した場合でも、警告を出して続行するようにした。
  - 設定画面で「デフォルト」をクリックした時の挙動を修正。
    「デフォルト」をクリックしたあと、「キャンセル」してもキャンセルされていなかった。
  - ログウィンドウで出力ファイル名を右クリックから
    「動画を再生」「動画のあるフォルダを開く」機能を追加。
  - 変更したフォントの(標準⇔斜体)が保存されない問題を修正。

2012.11.17 (0.01)
・シークができなくなる問題に対処。
・ログウィンドウの色の指定を可能に。ログウィンドウ右クリックから。

2012.11.06 (0.00)
  公開

2012.11.04
  エンコードスレッドを別に立てて高速化
  
2012.11.03
  パイプライン型エンコードにより高速化
  
2012.11.01
  なんか遅い
  
2012.10.28
  結構遅い。CPUが遊ぶ
  
2012.10.27
  とりあえず動く