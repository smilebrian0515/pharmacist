# This Python file uses the following encoding: utf-8
import os, sys
import httplib, urllib, json, requests


# Replace or verify the region.
#
# You must use the same region in your REST API call as you used to obtain your subscription keys.
# For example, if you obtained your subscription keys from the westus region, replace
# "westcentralus" in the URI below with "westus".
#
# NOTE: Free trial subscription keys are generated in the westcentralus region, so if you are using
# a free trial subscription key, you should not need to change this region.


def returnarray(pic):

    subscription_key = 'bec9c58578e046ef8c57ecb2a8a1795d'

    headers = {
        # Request headers.
        'Content-Type': 'application/octet-stream',
        'Ocp-Apim-Subscription-Key': subscription_key,
    }

    params = urllib.urlencode({
        # Request parameters. The language setting "unk" means automatically detect the language.
        'language': 'unk',
        'detectOrientation ': 'true',
    })

    try:
        # DropboxAuth.setup()
        # Execute the REST API call and get the response.
        body = ""
        filename = pic
        # with open(img_filename, 'rb') as f:
        #    img_data = f.read()
        f = open(filename, "rb")
        body = f.read()
        f.close()

        conn = httplib.HTTPSConnection('westcentralus.api.cognitive.microsoft.com')
        conn.request("POST", "/vision/v1.0/ocr?%s" % params, body, headers)
        response = conn.getresponse()
        data = response.read()

        parsed = json.loads(data)
        print ("Response:")

        substring = [3, 0, 2, 5, 3, 0, 0, 3]
        index = 0

        a0 = []
        a1 = []
        a2 = []
        scanobject = []

        for x in [11, 13, 34, 7, 16, 18, 15, 14]:
            result = ""
            for y in range(substring[index], len(parsed["regions"][0]["lines"][x]["words"])):
                # print(parsed["regions"][0]["lines"][x]["words"][y]["text"])
                # if index == 5:
                result += parsed["regions"][0]["lines"][x]["words"][y]["text"]

            if index <= 1:
                if index == 1:
                    if result.encode('utf-8') == "小姐":
                        a0.append(0)
                    else:
                        a0.append(1)
                else:
                    a0.append(result)
            elif index <= 3:
                a1.append(result)
            else:
                if index == 5:
                    a2.append(result[1:len(result)-1])
                elif index == 6:
                    for i in range(0, len(result) - 1):
                        if(result[i:i+1] == ","):
                            breakindex = i
                            break
                    a2.append(result[0:breakindex])
                    a2.append(result[breakindex + 1:len(result)])
                else:
                    a2.append(result)

            index += 1

        scanobject.append(a0)
        scanobject.append(a1)
        scanobject.append(a2)

        print(scanobject[0][0])
        print(scanobject[0][1])
        print(scanobject[1][0])
        print(scanobject[1][1])
        print(scanobject[2][0])
        print(scanobject[2][1])
        print(scanobject[2][2])
        print(scanobject[2][3])
        print(scanobject[2][4])

        conn.close()

    except Exception as e:
        print('Error:')
        print(e)

    return scanobject

# returnarray()
